<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
	
	
	/**
	 * Sage includes
	 *
	 * The $theme_includes array determines the code library included in your theme.
	 * Add or remove files to the array as needed. Supports child theme overrides.
	 *
	 * Please note that missing files will produce a fatal error.
	 *
	 * @link https://github.com/roots/sage/pull/1042
	 */
	$theme_includes = [
		'lib/assets.php',       // Scripts and stylesheets
		'lib/setup.php',        // Theme setup
		'lib/customizer.php',   // Theme customizer
		'lib/woocommerce.php',  // WooCommerce Functions
		'lib/shopical.php',  // WooCommerce Functions
		'lib/ACF_Forms.php',    // ACF Gravity Forms field
		'lib/custom-types.php', // CPT & Taxonomy loader
		'lib/login.php',        // Promotion
	];
	
	foreach ($theme_includes as $file) {
		if (!$filepath = locate_template($file)) {
			trigger_error(sprintf(__('Error locating %s for inclusion', 'shopical-pro'), $file), E_USER_ERROR);
		}
		
		require_once $filepath;
	}
	unset($file, $filepath);
	
	/**
	 * Admin Styles
	 *
	 * Add styles to the admin area. Helps with visual clutter on ACF fields,
	 * viewing SVG in media loader, etc.
	 */
	
	
	
	function admin_styles() {
		ob_start();
		include  'templates/admin-styles.php';
		echo 'GREGMILLER';
		$output = ob_get_clean();
		echo $output;
	}
	add_action( 'admin_head', 'admin_styles' );
	
	
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap','font-awesome','owl-carousel','owl-theme-default','sidr','jquery-countdown' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
