<?php

	// Exit if accessed directly
	if (!defined('ABSPATH')) exit;

	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_theme_support( 'automatic-feed-links' );

	add_action( 'after_theme_support', 'remove_feed' );

	function custom_admin_footer() {
		echo 'Created by Studio Vuurkever';
	}
	add_filter('admin_footer_text', 'custom_admin_footer');

	

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

	/**
	 * Filters the block locking settings to restrict it to admin users only.
	 *
	 * @param array $settings The current block locking settings.
	 * @param array $context The context of the block.
	 * @return array The updated block locking settings.
	 */
	function bvdb_admin_only_block_locking($settings, $context)
	{
		// admin level only
		// change current_user_can to 'delete_others_posts' for editor level+
		$settings['canLockBlocks'] = current_user_can('activate_plugins');
		return $settings;
	}


	/**
	 * Adds support for SVG files in the WordPress media uploader.
	 *
	 * @param array $mimes The current array of mime types.
	 * @return array The updated array of mime types with SVG support added.
	 */

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
		}
	add_filter('upload_mimes', 'cc_mime_types');



	/**
	 * Filters the allowed block types for the Gutenberg editor.
	 *
	 * @param array $allowed_blocks The array of allowed block types.
	 * @param string $editor_context The context of the editor.
	 * @return array The modified array of allowed block types.
	 */
	function sv_allowed_block_types( $allowed_blocks, $editor_context ) {
		return array(
			'core/paragraph',
			'acf/test',
			'acf/gallery',
		);
	}
	add_filter( 'allowed_block_types_all', 'sv_allowed_block_types', 25, 2 );