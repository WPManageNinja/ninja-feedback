const mix      = require('laravel-mix');
const min = '.min';

mix.setPublicPath('assets');
mix.setResourceRoot('../');

mix.js('src/admin/main.js', `assets/js/ninja-tables-admin${min}.js`);
mix.js('src/public/js/ninja-tables-footable.js', `assets/js/ninja-tables-footable${min}.js`);

mix.sass('src/public/css/_public.scss', `assets/css/ninja-tables-public${min}.css`);
mix.sass('src/admin/css/ninja-tables-admin.scss', `assets/css/ninja-tables-admin${min}.css`);