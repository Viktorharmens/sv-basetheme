<?php

    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;
    /**
     * Get the pagination links
     *
     * @return array with pagination 
     */
    function getPagination() {
		global $wp_query;
		$big = 999999999;
		return paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'prev_text' => __('', 'bvdb'),
			'next_text' => __('', 'bvdb')
		) );
    }

    add_action( 'pre_get_posts' ,'number_of_posts_for_projects', 1, 1 );
        function number_of_posts_for_projects( $query ) {
        if ( ! is_admin() && is_post_type_archive( 'projects' ) && $query->is_main_query() ) {
            $query->set( 'posts_per_page', 6 ); //set query arg ( key, value )
        }
    }