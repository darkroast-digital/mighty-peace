/*
 |--------------------------------------------------------------------------
 | #ASSET MANAGEMENT
 |--------------------------------------------------------------------------
 */

 const { mix } = require('laravel-mix')
 const config = require('./config')



 // ========================================================================

 mix.js(config.js.in, '/assets/js/app.js')
    .sass(config.sass.in, config.sass.out)
    	.options({
    		postCss: [
    			require('autoprefixer')
    		],
            processCssUrls: false
    	})
        .sourceMaps()
        .browserSync({
        	proxy: '127.0.0.1:8000',
        	files: config.watch 	
        })
