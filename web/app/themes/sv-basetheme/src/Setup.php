<?php

namespace SV\Theme;

/**
 * Theme supports, menu's en afbeeldingsformaten.
 */
class Setup
{
    public function register(): void
    {
        add_action('after_setup_theme', [$this, 'setup']);
    }

    public function setup(): void
    {
        load_theme_textdomain('sv-basetheme', get_template_directory() . '/languages');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('responsive-embeds');
        add_theme_support('align-wide');
        add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets']);
        add_theme_support('yoast-seo-breadcrumbs');

        add_image_size('bigthumb', 500, 500, true);

        register_nav_menus([
            'main' => __('Hoofdmenu', 'sv-basetheme'),
            'footer' => __('Footermenu', 'sv-basetheme'),
        ]);
    }
}
