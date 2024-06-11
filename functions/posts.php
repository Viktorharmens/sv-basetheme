
<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Retrieves an array of project data from the WordPress database.
 *
 * This function queries the 'projects' post type from the WordPress database
 * and retrieves the project data for the latest 6 projects. The project data
 * includes the title, location, client, work, size, budget, year, and image
 * of each project. The function returns an array of project data.
 *
 * @return array An array of project data.
 */
function getProjects() {
        $args = array(
            'post_type' => 'projects',
            'posts_per_page' => 6,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        );

        $query = new WP_Query($args);

        $allprojects = array();

        if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

            $allprojects[] = array(
                'title' => get_the_title(),
                'location' => get_field('location'),
                'client' => get_field('client'),
                'work' => get_field('work'),
                'size' => get_field('size'),
                'budget' => get_field('budget'),
                'year' => get_field('year'),
                'image' => get_post_thumbnail_id()
            );

            endwhile; endif; wp_reset_query();

            return $allprojects;

}

/**
 * Retrieves the latest news posts from a specified category.
 *
 * @param string $cat_name The name of the category to retrieve news posts from.
 * @return array An array of news posts, each containing 'title', 'image', and 'link' keys.
 */
function getNews($cat_name) {

    $args = array (
        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'DSC',
        'category_name' => $cat_name,
        'post__not_in' => array(get_the_ID())
    );

    $query = new WP_Query($args);

    $allposts = array();

    if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();

        $allposts[] = array(
            'title' => get_the_title(),
            'image' => get_the_post_thumbnail_url(),
            'link' => get_the_permalink()
        );

        endwhile; endif; wp_reset_query();

        return $allposts;

}