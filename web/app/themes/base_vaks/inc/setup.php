<?php
/*
 *  Theme
 *  Custom functions, support, custom post types and more.
 */

if ( ! function_exists( 'theme_support' ) ) :
	function theme_support() {
		// Alignwide and alignfull classes in the block editor.
		add_theme_support( 'align-wide' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for responsive embedded content.
		// https://github.com/Wordpress/gutenberg/issues/26901
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enqueue editor styles.
		add_editor_style(
			array(
				'/assets/ponyfill.css',
			)
		);

		add_filter(
			'block_editor_settings_all',
			function( $settings ) {
				$settings['defaultBlockTemplate'] = '<!-- wp:group {"layout":{"inherit":true}} --><div class="wp-block-group"><!-- wp:post-content /--></div><!-- /wp:group -->';
				return $settings;
			}
		);

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'theme_support', 9 );

/**
 * SVG WP Support
 * define( 'ALLOW_UNFILTERED_UPLOADS', true ); - need to add wp-config.php as well
 */
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Register Gutenberg ACF Flex Blocks
 */
function acf_init_block_types() {
	// Check function exists.
	if( function_exists('acf_register_block_type') ) {
		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'flex-layouts',
			'title'             => __('Theme ACF Blocks'),
			'description'       => __('Theme ACF Flexible Blocks'),
			'render_template'   => 'templates/acf/acf.php',
			'mode'          	=> 'preview',
			'category'          => 'design',
			'icon'              => 'layout',
			'show_in_graphql' 	=> true,
			'keywords'          => array( 'flex', 'layouts' ),
			'supports'      	=> [
				'align'         => false,
				'anchor'        => true,
				'customClassName'   => true,
				'jsx'           => true,
			]
		));
	}
}
add_action('acf/init', 'acf_init_block_types');

/**
 * Post Edit Link New Tab
 */
add_filter( 'edit_post_link', function( $link, $post_id, $text ) {
	// Add the target attribute 
	if( false === strpos( $link, 'target=' ) )
		$link = str_replace( '<a ', '<a target="_blank" ', $link );
	return $link;
}, 10, 3 );

/**
 * Register Caballero Default Menus
 */
function caballero_menus() {
	$locations = array(
		'caballero-header-menu'   => __( 'Header Menu', 'caballero' ),
		'caballero-footer-menu'  => __( 'Footer Menu', 'caballero' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'caballero_menus' );