let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.scripts([
		
		'resources/assets/painel/js/techer.min.js',
		'resources/assets/painel/js/popper/popper.js',
		'node_modules/bootstrap/dist/js/bootstrap.js',
		'resources/assets/painel/js/jquery.cookies.js',
	    'resources/assets/painel/js/jquery.validate.js',
		'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js',
		'resources/assets/painel/js/charts-home.js',
		'resources/assets/painel/js/charts-custom.js',
        'resources/assets/painel/js/front.js'
              

       
    	
    	], 'public/js/app.js');

	
	 mix.styles([
		 	     //   'node_modules/bootstrap/dist/css/bootstrap.css',
		 	      //  'resources/assets/painel/css/style.sea.css',
		  			'resources/assets/painel/css/custom.css',
		   			'resources/assets/painel/css/font-awesome.css'
		   			

		   	],'public/css/app.css');
		

		 mix.copy('resources/assets/painel/fonts', 'public/fonts');