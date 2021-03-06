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
  .js('resources/assets/js/custom.js', 'public/js') //Ajout d'un fichier à compiler
  .sass('resources/assets/sass/app.scss', 'public/css')
  .browserSync({
    proxy: {
      //Redirection vers localhost normal
      // target: '127.0.0.1',
      //Redirection vers php artisan serve
      target: 'localhost:8000',
      reqHeaders: function() {
        return {
          host: 'localhost:3000'
        };
      }
    }
  });
