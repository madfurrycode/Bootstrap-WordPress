/*
 * Bootstrap WP uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/5.6/mix
 */

let mix = require( 'laravel-mix' );

mix.browserSync({
	proxy: 'http://bootstrapwp.co.za/',
	files: [
		'**/*.php',
		'assets/dist/css/**/*.css',
		'assets/dist/js/**/*.js',
    '**/*.css'
	],
	injectChanges: true,
	open: false
});

// Autloading jQuery.
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix.setPublicPath( './assets/dist' );

// Compile assets
mix.sass( 'assets/src/sass/style.scss', '../../style.css' );

// Add versioning to assets in production environment
if ( mix.inProduction() ) {
	mix.version();
}
