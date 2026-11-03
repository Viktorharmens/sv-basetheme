<?php

namespace SV\Theme;

/**
 * Laadt de gebouwde CSS en JS uit dist/ (npm run build).
 */
class Assets
{
    public function register(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        add_action('wp_head', [$this, 'preloadFonts'], 1);
    }

    public function enqueue(): void
    {
        wp_enqueue_style('sv-style', self::uri('css/style.css'), [], SITE_VERSION);
        wp_enqueue_script('sv-script', self::uri('js/script.js'), [], SITE_VERSION, [
            'strategy' => 'defer',
            'in_footer' => true,
        ]);
    }

    /**
     * Preload het hoofdlettertype, zodat tekst niet verspringt.
     */
    public function preloadFonts(): void
    {
        foreach (glob(get_template_directory() . '/dist/fonts/*-latin-wght-normal.woff2') ?: [] as $file) {
            printf(
                '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
                esc_url(self::uri('fonts/' . basename($file))),
            );
        }
    }

    public static function uri(string $path): string
    {
        return get_template_directory_uri() . '/dist/' . ltrim($path, '/');
    }
}
