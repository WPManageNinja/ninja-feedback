const mix      = require('laravel-mix');
const min = '';

mix.setPublicPath('resources');
mix.setResourceRoot('../');

mix.js('src/admin/feedback_settings.js', `resources/assets/js/feedback_settings_admin${min}.js`);
