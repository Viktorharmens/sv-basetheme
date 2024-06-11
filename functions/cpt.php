<?php
	
	function projects() {	
		$labels = array(
			'name'                => _x( 'Projecten', 'Post Type General Name', 'hagemans' ),
			'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'hagemans' ),
			'menu_name'           => __( 'Projecten', 'hagemans' ),
			'parent_item_colon'   => __( 'Hoofd project:', 'hagemans' ),
			'all_items'           => __( 'Alle projecten', 'hagemans' ),
			'view_item'           => __( 'Toon project', 'hagemans' ),
			'add_new_item'        => __( 'Voeg nieuw project toe', 'hagemans' ),
			'add_new'             => __( 'Voeg nieuwe toe', 'hagemans' ),
			'edit_item'           => __( 'Bewerk project', 'hagemans' ),
			'update_item'         => __( 'Update project', 'hagemans' ),
			'search_items'        => __( 'Zoek project', 'hagemans' ),
			'not_found'           => __( 'Niet gevonden', 'hagemans' ),
			'not_found_in_trash'  => __( 'Niet gevonden in prullenbak', 'hagemans' ),
		);
		$rewrite = array(
			'slug'                => _x( 'projecten', 'URL slug', 'hagemans' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Projecten', 'hagemans' ),
			'description'         => __( '', 'hagemans' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'page-attributes', ),
			'taxonomies'          => array( '' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 24,
			'menu_icon'           => 'dashicons-building',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type( 'projects', $args );
	}
	add_action( 'init', 'projects', 0 );
	
	
	function team() {	
		$labels = array(
			'name'                => _x( 'Team', 'Post Type General Name', 'hagemans' ),
			'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'hagemans' ),
			'menu_name'           => __( 'Team', 'hagemans' ),
			'parent_item_colon'   => __( 'Hoofd team:', 'hagemans' ),
			'all_items'           => __( 'Alle teamleden', 'hagemans' ),
			'view_item'           => __( 'Toon team', 'hagemans' ),
			'add_new_item'        => __( 'Voeg nieuw team toe', 'hagemans' ),
			'add_new'             => __( 'Voeg nieuwe toe', 'hagemans' ),
			'edit_item'           => __( 'Bewerk team', 'hagemans' ),
			'update_item'         => __( 'Update team', 'hagemans' ),
			'search_items'        => __( 'Zoek team', 'hagemans' ),
			'not_found'           => __( 'Niet gevonden', 'hagemans' ),
			'not_found_in_trash'  => __( 'Niet gevonden in prullenbak', 'hagemans' ),
		);
		$args = array(
			'label'               => __( 'Team', 'hagemans' ),
			'description'         => __( '', 'hagemans' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
			'taxonomies'          => array( '' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 23,
			'menu_icon'           => 'dashicons-groups',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => null,
			'capability_type'     => 'post',
		);
		register_post_type( 'team', $args );
	}
	add_action( 'init', 'team', 0 );
	
	
	
	function vacancies() {	
		$labels = array(
			'name'                => _x( 'Vacatures', 'Post Type General Name', 'hagemans' ),
			'singular_name'       => _x( 'Vacature', 'Post Type Singular Name', 'hagemans' ),
			'menu_name'           => __( 'Vacatures', 'hagemans' ),
			'parent_item_colon'   => __( 'Hoofd vacature:', 'hagemans' ),
			'all_items'           => __( 'Alle vacatures', 'hagemans' ),
			'view_item'           => __( 'Toon vacature', 'hagemans' ),
			'add_new_item'        => __( 'Voeg nieuwe vacature toe', 'hagemans' ),
			'add_new'             => __( 'Voeg nieuwe toe', 'hagemans' ),
			'edit_item'           => __( 'Bewerk vacature', 'hagemans' ),
			'update_item'         => __( 'Update vacature', 'hagemans' ),
			'search_items'        => __( 'Zoek vacatures', 'hagemans' ),
			'not_found'           => __( 'Niet gevonden', 'hagemans' ),
			'not_found_in_trash'  => __( 'Niet gevonden in prullenbak', 'hagemans' ),
		);
		$args = array(
			'label'               => __( 'Vacatures', 'hagemans' ),
			'description'         => __( '', 'hagemans' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail' ),
			'taxonomies'          => array( '' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 21,
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => '',
			'capability_type'     => 'post',
		);
		register_post_type( 'vacancies', $args );
	}
	add_action( 'init', 'vacancies', 0 );

	// Define categories
	// add_action( 'init', 'build_taxonomies', 0 );
	// function build_taxonomies() {
	// 	register_taxonomy( 'type', 'products', array( 'hierarchical' => true, 'label' => __('Producttype', 'hagemans'), 'query_var' => true, 'rewrite' => true ) );
	// }
	
	
?>