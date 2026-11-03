<?php

namespace SV\Theme;

/**
 * Haalt overbodige WordPress-output weg voor een snellere voorkant.
 */
class Cleanup
{
    public function register(): void
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'feed_links_extra', 3);

        add_action('wp_enqueue_scripts', [$this, 'dequeue'], 100);
        add_filter('admin_footer_text', fn() => 'Gemaakt door Studio Vuurkever');
    }

    /**
     * Styling komt uit Tailwind; de standaard Gutenberg-CSS en jQuery zijn op de voorkant niet nodig.
     */
    public function dequeue(): void
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('global-styles');

        if (! is_admin() && ! is_user_logged_in()) {
            wp_dequeue_script('jquery');
        }
    }
}
