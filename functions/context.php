<?php

    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;

    /**
     * Global Timber context.
     *
     * @param array $context Global context variables.
     */
    function add_to_context($context)
    {
        // Set all nav menus in context.
        foreach (array_keys(get_registered_nav_menus()) as $location) {
            // Bail out if menu has no location.
            if (!has_nav_menu($location)) {
                continue;
            }

            $menu = Timber::get_menu($location);

            $context[$location] = $menu;
        }

        return $context;
    }