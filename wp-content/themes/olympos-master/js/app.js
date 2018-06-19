jQuery(document).ready(function($){



//Vue.use(VueRouter);

//components
const postList = { template: "#post-list-template" }


//routes
const routes = [

	{ path: '/', component: postList }

]

//router instance
var router = new VueRouter({

	routes
	
});



new Vue({
	el: '#app',
	router,

	 data: {
	    results: []
	  },

	  mounted(){
	  	axios.get('/wp-json/wp/v2/posts?per_page=20')
	  		 .then(response => {this.results = response.data.results})
	  }

});


});