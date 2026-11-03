<?php

    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;

	add_action('init', 'register_my_custom_post_types');

	function register_my_custom_post_types() {
		// Register the "Projecten" custom post type
		$projects_args = array(
			'label' => 'Projecten', 
			'public' => true, 
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'), 
			'has_archive' => true, 
			'rewrite' => array('slug' => 'projecten'),
			'menu_icon' => 'dashicons-building'
		);
		register_post_type('project', $projects_args); 
	
		// Register the "Team" custom post type
		$team_args = array(
			'label' => 'Team',
			'public' => true, 
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
			'has_archive' => true, 
			'rewrite' => array('slug' => 'team'), 
			'menu_icon' => 'dashicons-businesswoman'
		);
		register_post_type('team', $team_args); 

		// Register the category taxonomy
		$taxonomy_args = array(
			'label' => 'Team Categorieën',
			'public' => true,
			'hierarchical' => true, 
			'show_in_rest' => true, 
			'rewrite' => array('slug' => 'team-categorie'), 
		);
		register_taxonomy('team_category', 'team', $taxonomy_args);
	}
	
	
	
?>