
// // After (using require)
// const mix = require('laravel-mix');
// mix.sass('public/assets/css/dashboard.css', 'public/css');

// const vite = require('laravel-mix-vite');

// mix.vite();


// // After (using require)
// const mix = require('laravel-mix');
// // mix.sass('public/assets/css/dashboard.css', 'public/css');

// mix.js('resources/js/app.js', 'public/js')
// .sass('resources/sass/app.scss', 'public/css')
// .sourceMaps();




const mix = require('laravel-mix');

// Use laravel-mix-vite for Vite integration
const vite = require('laravel-mix-vite');
mix.extend('vite', vite);

// Compile Sass to CSS
mix.sass('resources/sass/app.scss', 'public/css');

// Compile JavaScript with Vite
mix.vite();

// Source maps for easier debugging
mix.sourceMaps();
