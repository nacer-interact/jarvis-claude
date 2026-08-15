<?php
/**
 * Interact International child theme.
 * Enqueue parent (Twenty Twenty-Five) styles, then this theme's own stylesheet.
 */

add_action( 'wp_enqueue_scripts', function () {
	$parent = wp_get_theme( get_template() );
	wp_enqueue_style(
		'twentytwentyfive-style',
		get_template_directory_uri() . '/style.css',
		array(),
		$parent->get( 'Version' )
	);

	wp_enqueue_style(
		'interact-international-style',
		get_stylesheet_uri(),
		array( 'twentytwentyfive-style' ),
		wp_get_theme()->get( 'Version' )
	);
} );
