<?php

function news_hub_intro_text( $default_text ) {
	$default_text .= sprintf(
		'<p class="about-description">%1$s <a href="%2$s" target="_blank">%3$s</a></p>',
		esc_html__( 'Demo content files for Adore News Theme.', 'news-hub' ),
		esc_url( 'https://demo.adorethemes.com/documentations/docs/news-hub/demo-data/' ),
		esc_html__( 'Click here for Demo File download', 'news-hub' )
	);

	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'news_hub_intro_text' );

/**
 * OCDI after import.
 */
function news_hub_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$social_menu  = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $primary_menu->term_id,
			'social'  => $social_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'ocdi/after_import', 'news_hub_after_import_setup' );
