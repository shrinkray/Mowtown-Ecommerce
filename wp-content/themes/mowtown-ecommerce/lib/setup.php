<?php

	/**
	 *
	 */
	function enqueue_after_wc() {
    // vars
    $jsFileURI = get_stylesheet_directory_uri() . '/dist/bundled.js';
    $ver = time();

    wp_enqueue_script('site_main_js', $jsFileURI, [], $ver, true);
}
add_action('wp_enqueue_scripts', 'enqueue_after_wc', 20);
	
