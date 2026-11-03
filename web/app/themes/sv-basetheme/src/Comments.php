<?php

namespace SV\Theme;

/**
 * Zet reacties en trackbacks overal uit, in de admin en op de site.
 */
class Comments
{
    public function register(): void
    {
        add_action('admin_init', [$this, 'removeSupport']);
        add_action('admin_menu', fn() => remove_menu_page('edit-comments.php'));
        add_action('admin_bar_menu', fn($bar) => $bar->remove_node('comments'), 999);
        add_filter('comments_open', '__return_false', 20);
        add_filter('pings_open', '__return_false', 20);
        add_filter('comments_array', '__return_empty_array', 10);
    }

    public function removeSupport(): void
    {
        global $pagenow;

        if ($pagenow === 'edit-comments.php') {
            wp_safe_redirect(admin_url());
            exit;
        }

        foreach (get_post_types() as $postType) {
            if (post_type_supports($postType, 'comments')) {
                remove_post_type_support($postType, 'comments');
                remove_post_type_support($postType, 'trackbacks');
            }
        }
    }
}
