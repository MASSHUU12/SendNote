const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/cConsent.js", "public/js")
    .js("resources/js/copyText.js", "public/js")
    .js("resources/js/detectLocale.js", "public/js")
    .js("resources/js/inputValidation.js", "public/js")
    .js("resources/js/showOptions.js", "public/js")
    .sass("resources/css/app.scss", "public/css")
    .version()
    .disableNotifications();
