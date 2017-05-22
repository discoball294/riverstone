const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.styles([
        'bootstrap.min.css',
        'font-awesome.css',
        'magnific-popup.css',
        'shortcodes/shortcodes.css',
        'owl.carousel.css',
        'owl.theme.css',
        'style.css',
        'style-responsive.css',
        'green-theme.css'

    ])
        .webpack('app.js');
});