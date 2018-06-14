
(function(){

var portfolioPostsBtn = document.getElementById("portfolio-posts-btn");
 var portfolioPostsContainer = document.getElementById("portfolio-posts-container");

 if(portfolioPostsBtn){

 	portfolioPostsBtn.addEventListener("click", function(){
 		console.log("KLIKED");
 	}, false);
 }

})();

document.ondomcontentready=function(){
	console.log("DOM LOADED");
}