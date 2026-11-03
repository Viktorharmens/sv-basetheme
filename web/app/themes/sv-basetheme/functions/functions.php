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

	
	/**
	 * Disables comments and trackbacks for all post types that support them.
	 *
	 * This function retrieves all post types and checks if each post type supports comments and trackbacks.
	 * If a post type supports comments and trackbacks, the function removes support for both.
	 *
	 * @throws None
	 * @return void
	 */
	function disable_comments_post_types_support() {
		$post_types = get_post_types();
		foreach ($post_types as $post_type) {
			if (post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}
	add_action('admin_init', 'disable_comments_post_types_support');

	/**
	 * Disables the Comments menu item in the WordPress admin menu.
	 *
	 * This function removes the 'Comments' menu item from the WordPress admin menu.
	 * This is useful when you want to hide the comments section from the admin menu.
	 *
	 * @throws None
	 * @return void
	 */
	function disable_comments_admin_menu() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'disable_comments_admin_menu');

	/**
	 * Redirects the user from the 'edit-comments.php' page to the admin URL if the current page is 'edit-comments.php'.
	 *
	 * @throws None
	 * @return void
	 */
	function disable_comments_admin_menu_redirect() {
		global $pagenow;
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url());
			exit;
		}
	}
	add_action('admin_init', 'disable_comments_admin_menu_redirect');

	/**
	 * Disables the comments menu in the admin bar.
	 *
	 * This function checks if the admin bar is showing and if so, it removes the action
	 * responsible for adding the comments menu to the admin bar.
	 *
	 * @throws None
	 * @return void
	 */
	function disable_comments_admin_bar() {
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	}
	add_action('init', 'disable_comments_admin_bar');
