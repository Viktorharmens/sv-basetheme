<?php

namespace SV\Theme;

use Timber\Timber;

/**
 * Globale Timber-context: menu's en site-opties.
 */
class Context
{
    public function register(): void
    {
        add_filter('timber/context', [$this, 'add']);
    }

    public function add(array $context): array
    {
        foreach (array_keys(get_registered_nav_menus()) as $location) {
            if (has_nav_menu($location)) {
                $context['menu'][$location] = Timber::get_menu($location);
            }
        }

        $context['options'] = function_exists('get_fields') ? (get_fields('option') ?: []) : [];

        return $context;
    }
}
