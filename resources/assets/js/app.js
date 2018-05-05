
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('autocomplete', require('./components/Autocomplete.vue'));

const app = new Vue({
    el: '#app',
    //Trabalhando dentro da pagina listLinks.blade.php
      props: [
        'links'
      ],
    data(){
   return {
   			
   			query: '',
            results: [],
   			titulo:'Listar Links'
    	}
    },
   
        	methods: {
        	autoComplete(){
    		this.results = [];
   		    if(this.query.length > 1){
     	    axios.get('/sistema/search',{params: {query: this.query}}).then(response => {
     	    this.results = response.data;
     });
    }else{
    	this.query  = this.results
    }
   }
  },

   /* mounted(){


  			//this.results = JSON.parse(this.links),
  	
		     axios.get('/sistema/search')
			.then((response)=> this.results = this.links = response.data)
			.catch((error) => this.errors = error.response.data.errors)
		},*/
    
});
