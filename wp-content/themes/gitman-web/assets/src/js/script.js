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
    previousBtn.on('click', getPreviousPost);
  }

  
  function getPreviousPost(){

    var previousPostId = $(this).attr('data-id');
    var jsonUrl = restRootUrl + 'wp/v2/posts/' + previousPostId;

    $.ajax({

      dataType: 'json',
      url: jsonUrl

    }).done(function(data){

      //console.log(data);
      buildPost(data);

    }).fail(function(){

      console.log("ERROR");

    }).always(function(){

      console.log('AJAX complete');

    });
  }

  function buildPost(data){
     var content = 
      '<div class="generated">' +
        '<h1>' + data.title.rendered + '</h1>' +
        '<div class="post-content">' +
        '<p>' + data.content.rendered + '</p>' +
        '</div>' +
      '</div>';

      $('.post-navigation').replaceWith(content);
  }
  //functions calls

  previousPostTrigger();

})(jQuery);


