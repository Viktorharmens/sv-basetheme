<?php

	// Exit if accessed directly
	if (!defined('ABSPATH')) exit;

	// Remove Gutenberg stylesheets from frontend for performance
	function remove_gutenberg_stylesheets()
	{
		wp_dequeue_style('wp-block-library');              // Gutenberg blocks styles
		wp_dequeue_style('wp-block-library-theme');        // Gutenberg default theme styles
		wp_dequeue_style('wc-block-style');                // WooCommerce blocks styles
		wp_dequeue_style('storefront-gutenberg-blocks');   // Storefront theme's Gutenberg blocks styles (if applicable)
		// Add any other Gutenberg stylesheets you want to remove
	}
	add_action('wp_enqueue_scripts', 'remove_gutenberg_stylesheets', 100);

	// Remove Gutenberg stylesheets from backend for performance
	function remove_gutenberg_backend_styles()
	{
		wp_dequeue_style('wp-block-library');              // Gutenberg blocks styles
		wp_dequeue_style('wp-block-library-theme');        // Gutenberg default theme styles
		wp_dequeue_style('wc-block-style');                // WooCommerce blocks styles
		wp_dequeue_style('storefront-gutenberg-blocks');   // Storefront theme's Gutenberg blocks styles (if applicable)
	}
	add_action('admin_enqueue_scripts', 'remove_gutenberg_backend_styles', 100);

	// Disable unlocking of blocks by certain users
	// function bvdb_admin_only_block_locking($settings, $context)
	// {
	// 	// admin level only
	// 	// change current_user_can to 'delete_others_posts' for editor level+
	// 	$settings['canLockBlocks'] = current_user_can('activate_plugins');
	// 	return $settings;
	// }




	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
		}
	add_filter('upload_mimes', 'cc_mime_types');



	/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */


	function sv_allowed_block_types( $allowed_blocks, $editor_context ) {
		return array(
			'core/paragraph',
			'acf/test',
			'acf/gallery',
		);
	}
	add_filter( 'allowed_block_types_all', 'sv_allowed_block_types', 25, 2 );