var elixir = require('laravel-elixir');


elixir(function(mix) {
  //  mix.less("app.scss");
         mix.sass('app.scss').
        styles([
            'bootstrap.css',
            'bootstrap-theme.css'

        ],'./public/css/style.css')
       .scripts([
            'bootstrap.js',

        ],'./public/js/script.js')
});
