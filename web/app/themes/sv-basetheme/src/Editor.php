<?php

namespace SV\Theme;

/**
 * Laat de blockeditor op de site lijken en beperkt block locking tot beheerders.
 */
class Editor
{
    public function register(): void
    {
        add_action('after_setup_theme', [$this, 'editorStyles']);
        add_filter('block_editor_settings_all', [$this, 'blockLocking']);
    }

    public function editorStyles(): void
    {
        add_theme_support('editor-styles');
        add_editor_style('dist/css/editor.css');
    }

    public function blockLocking(array $settings): array
    {
        $settings['canLockBlocks'] = current_user_can('activate_plugins');

        return $settings;
    }
}
