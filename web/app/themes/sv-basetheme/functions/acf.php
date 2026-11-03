<?php   

    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;
    /**
     * Get the site option fields
     *
     * @return array list of all site option fields
     */
    function getSiteOption( $fieldkey ) {
        $fieldvalue = get_field($fieldkey, 'option');
        return $fieldvalue;
    }

    // get_the_content with formatting
    function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
        $content = get_the_content($more_link_text, $stripteaser, $more_file);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }

    add_filter('acf/settings/save_json', function ($path){
        return get_template_directory() . '/acf';
    });

    add_filter('acf/settings/load_json', function($paths){
        unset($paths[0]);
        $paths[] = get_template_directory() . '/acf';
        return $paths;
    });


    // Setup option page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Thema instellingen',
			'menu_title'	=> 'Site opties',
			'redirect'		=> false,
			'position' 		=> 2,
			'icon_url'		=> 'dashicons-feedback'
		));
	}