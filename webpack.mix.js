const mix=require('laravel-mix');
mix.js('resources/js/app.js','public/js')
.sass('resources/sass/app.scss','public/js');
mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');