<?php
/*
 * Plugin Name: Freecanser Toolkit
 * Description: This pluging is Requre to all theme options.
 * Version: 1.0
 * Text Domain: freecanser-toolkit
 * Domain Path: /languages
 */
define('FREECANCSER_ACC_PATH', plugin_dir_path(__FILE__));
 
 function freecanser_init() {
    load_plugin_textdomain( 'freecanser-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'freecanser_init' );

require_once FREECANCSER_ACC_PATH . 'inc/redux-core/framework.php';
require_once FREECANCSER_ACC_PATH . 'inc/redux-core/freecanser-options.php';
require_once FREECANCSER_ACC_PATH . 'inc/elementor.php';
require_once FREECANCSER_ACC_PATH . 'inc/acf.php';
require_once FREECANCSER_ACC_PATH . 'inc/icons.php';


function freecanser_service_post_type() {
	register_post_type('services',
		array(
			'labels'      => array(
				'name'          => __('Services', 'freecanser-toolkit'),
				'singular_name' => __('service', 'freecanser-toolkit'),
                'featured_image'        => __( 'Banner Image', 'freecanser-toolkit' ),
                'set_featured_image'    => __( 'Set Banner image', 'freecanser-toolkit' ),
                'remove_featured_image' => __( 'Remove Banner image', 'freecanser-toolkit' ),
                'use_featured_image'    => __( 'Use as Banner image', 'freecanser-toolkit' ),
			),
				'public'      => true,
                'has_archive' => true,
                'menu_icon'   => 'dashicons-grid-view',
				'supports' => array( 'title', 'editor','excerpt' ),
		)
	);
}
add_action('init', 'freecanser_service_post_type');


function freecanser_protfolio_post_type() {
	register_post_type('protfolios',
		array(
			'labels'      => array(
				'name'          => __('Protfolios', 'freecanser-toolkit'),
				'singular_name' => __('protfolio', 'freecanser-toolkit'),
                'featured_image'        => __( 'Banner Image', 'freecanser-toolkit' ),
                'set_featured_image'    => __( 'Set Banner image', 'freecanser-toolkit' ),
                'remove_featured_image' => __( 'Remove Banner image', 'freecanser-toolkit' ),
                'use_featured_image'    => __( 'Use as Banner image', 'freecanser-toolkit' ),
			),
				'public'      => true,
                'has_archive' => true,
                'menu_icon'   => 'dashicons-grid-view',
				'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}
add_action('init', 'freecanser_protfolio_post_type');