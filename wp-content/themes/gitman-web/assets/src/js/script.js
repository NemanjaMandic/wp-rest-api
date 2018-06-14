jQuery(document).ready(function($){

 var portfolioPostsBtn = $("#portfolio-posts-btn");
 var portfolioPostsContainer = $("#portfolio-posts-container");

 portfolioPostsBtn.click(function(e){
 	e.preventDefault();
 	$.ajax({
 		url: magicData.root + "wp/v2/posts",
 		
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



