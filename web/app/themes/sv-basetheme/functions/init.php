<?php

    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;

	// Image support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'bigthumb', 500, 500, true);
	add_theme_support('align-wide');

	// menu registration
	register_nav_menus( array(
		'top' => __( 'top', 'sv-basetheme' ),
		'main' => __( 'main', 'sv-basetheme' ),
		'footer' => __( 'footer', 'sv-basetheme' ),
	));


	// Enqueue scripts and styles
	function enqueue_scripts_styles() {

		$is_editor = is_admin() && ! wp_doing_ajax();

		// Styles
		wp_enqueue_style('theme-style', get_template_directory_uri() . '/build/styles/styles.css', array(), '1.0.0', 'all');
		if ( $is_editor ) {
			wp_enqueue_style('theme-style-backend', get_template_directory_uri() . '/build/styles/editor-styles.css', array(), '1.0.0', 'all');
		}
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;400;700&display=swap', false );
		wp_enqueue_style( 'extra-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap', false );

		// Scripts
		wp_dequeue_script( 'wp-embed' );
		wp_dequeue_script( 'jquery' );
		wp_enqueue_script('theme-script', get_template_directory_uri() . '/build/scripts/scripts.js', array(), '1.0.0', true);
		if ( $is_editor ) {
			wp_enqueue_script('theme-script-backend', get_template_directory_uri() . '/build/scripts/editor.js', array(), '1.0.0', true);
		}

	}

	add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');

	function page_body_class( $classes ) {
		$ternary = get_field('page_type')? get_field('page_type')[0] : '';
		$classes[] = $ternary;
		
		return $classes;
	}
	add_filter( 'body_class', 'page_body_class' );
