jQuery(document).ready(function($){

 var portfolioPostsBtn = $("#portfolio-posts-btn");
 var portfolioPostsContainer = $("#portfolio-posts-container");

 portfolioPostsBtn.click(function(e){
 	e.preventDefault();
 	$.ajax({
 		url: magicData.root + "wp/v2/posts?page=5&per_page=1",
 		
 	}).done(function(data){

      // var post = data.shift();
      console.debug(data);

      getAllPosts();
      //portfolioPostsContainer.html("<h2>" + post.title.rendered + "</h2>");
      createHtml(data);
      //portfolioPostsContainer.html(post.content.rendered);
      $(portfolioPostsBtn).css("background", "red");

 	}).fail(function(){

 	});

 });


function createHtml(postsData){

   var htmlStr = '';

   for(var i=0; i < postsData.length; i++){
   		htmlStr += "<h2>" + postsData[i].title.rendered + "</h2>";
        htmlStr += "<p>" + postsData[i].content.rendered + "</p>";

        console.log(i);
   }
   

   portfolioPostsContainer.html(htmlStr);

   // $.each(postsData, function(k, v){
   //   console.log(postsData.title);
   // });

   
}
  function getAllPosts(){

   var posts = $.get("http://127.0.0.1:8080/wp-json/wp/v2/posts");

   console.log("Get All Posts " + posts.length);
  }


//Quick Add Post AJAX
var quickAddBtn = $("#quick-add-button");
if(quickAddBtn){

	quickAddBtn.click(function(e){
		e.preventDefault();

		var title = $("#title").val();
		var content = $("#content").val();
        
        // var serializedData = $(".admin-quick-add").serializeArray();
        // alert(serializedData);
		$.ajax({
			url: magicData.root + "wp/v2/posts",
			method: "POST",
            beforeSend: function(xhr){
				xhr.setRequestHeader('X-WP-Nonce', magicData.nonce)
			},
			data: {
              
              'title': title,
              'content': content,
              'status': 'publish'
			}
			
		}).done(function(response){
            console.log(response);
 			
 			$(".admin-quick-add")[0].reset();

		}).fail(function(response){
			console.log("Uppsss something fucked up");
		});
       
	});
}
});


/**
AJAX script to load previous post
*/
(function($){
  
  var restRootUrl = magicData.root;
  var themeUri = magicData.theme_uri;
  var postId = magicData.post_id;
  var nonce = magicData.nonce;
  var naslov = magicData.naslov;

  // console.log("Post ID " + postId);
  // console.log("Root URL " + restRootUrl);
  // console.log("Theme URI: " + themeUri);
  // console.log("Nonce: " + nonce);
  // console.log("Naslov: " + naslov);

  var previousBtn = $('.load-previous a');

  previousBtn.attr('href', 'javascript:void(0)');

  function previousPostTrigger(){
   
   var trigger = $('.load-previous a');

   var triggerPosition = trigger.offset().top + 2200 - $(window).outerHeight();
 
   $(window).scroll(function(event){
    if(triggerPosition > $(window).scrollTop()){
      return;
    }

    print("uso");
    print(triggerPosition);
    getPreviousPost(trigger);

    $(this).off(event);

   });

  }

  //function call
   previousPostTrigger();
  
  function getPreviousPost(trigger){

    var previousPostId = trigger.attr('data-id');

    var jsonUrl = restRootUrl + 'wp/v2/posts/' + previousPostId + '?_embed=true';

    $.ajax({

      dataType: 'json',
      url: jsonUrl

    }).done(function(data){

      //console.log(data);
      thePreviousPost(data);

    }).fail(function(){

      console.log("ERROR");

    }).always(function(){

      console.log('AJAX complete');

    });
  }

  function thePreviousPost(data){

    // get the featured image ID ( 0 if no featured image)
    var featuredImgID = data.featured_media;
   // print(featuredImgID);

    //Create an empty container for theoretical featured image
    var featImage; 

    function getFeaturedImage(){
      if(featuredImgID === 0){

        featImage = '';

      }else{

        var featuredObject = data._embedded['wp:featuredmedia'][0];
        var imgLarge = '';
        var imgWidth = featuredObject.media_details.sizes.full.width;
        var imgHeight = featuredObject.media_details.sizes.full.height;

        if(featuredObject.media_details.sizes.hasOwnProperty("large")){

          imgLarge = featuredObject.media_details.sizes.large.source_url + '1024w, ';

        }

        featImage = 
        '<div class="single-featured-image-header">' + 
            '<img src="' + featuredObject.media_details.sizes.full.source_url + '" ' +
            'width="' + imgWidth + '" ' +
            'height="' + imgHeight + '" ' +
            'class="featured-image"' +
            'alt=""' +
            'srcset="' + featuredObject.media_details.sizes.full.source_url + ' ' + imgWidth + 'w, ' + imgLarge + featuredObject.media_details.sizes.medium.source_url + ' 300w" ' +
            'sizes="100vw">' +

        '</div>';
      }

      return featImage;
    }

    //build the post with or without the featured image
   function buildPost(){

   var date = new Date(data.date);

     var content = 
        '<div class="generated">' +
          '<div class="wrap">' +
            '<article class="post hentry" data-id="' + data.id + '">' +
              '<span class="screen-reader-text">Posted on</span>' +
                '<a href="' + data.link + '" rel="bookmark">' +
                   '<time class="entry-date published" datetime="' + date + '">' + date.toDateString() +
                '</a>' +
              '</span>' +
              '<span class="byline"> Author Name: ' + data._embedded.author[0].name + '</span>' +
              '<h1 class="entry-title">' + data.title.rendered + '</h1>' +
              '<div class="entry-content">' +
                 data.content.rendered +
              '</div>' +
            '</article>' +
          '</div>' +
        '</div><!-- .generated -->' +
        '<!-- Navigation with button here -->' +
        '<nav class="navigation post-navigation load-previous" role="navigation">' +
            '<span class="nav-subtitle">Previous Post</span>' +
            '<div class="nav-links">' +
            '<div class="nav-previous">' +
              '<a href="javascript:void(0)" data-id="' + data.previous_post_ID + '">' +
                 data.previous_post_title +
              '</a>' +
            '</div><!-- nav-previous -->' +
            '</div><!-- .nav-links -->' +
        '</nav>';

        //Append related posts to the posts-navigation container
        $('.post-navigation').replaceWith(content);

         //Reinitialize the previous post trigger on new content
        previousPostTrigger();
   }
     
     buildPost();
  }
 


 function print(content){
  console.log(content);
 }
})(jQuery);


