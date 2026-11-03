<?php

    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;

    error_reporting(E_ALL);
    ini_set('display_errors', 'true');

    // Load Composer dependencies.
    require_once __DIR__ . '/vendor/autoload.php';

    // Initialize Timber.
    Timber\Timber::init();

    include_once 'functions/functions.php';
    include_once 'functions/acf.php';
    include_once 'functions/cpt.php';
    include_once 'functions/posts.php';
    include_once 'functions/init.php';
    include_once 'functions/navigation.php';
    include_once 'functions/context.php';



    function sv_register_acf_blocks() {
        foreach ($blocks = new DirectoryIterator( __DIR__ . '/blocks' ) as $item) {
            // Check if block.json file exists in each subfolder.
            if ($item->isDir() && !$item->isDot()
                && file_exists($item->getPathname() . '/block.json')
            ) {
                // Register the block given the directory name within the blocks
                // directory.
                register_block_type($item -> getPathname());
            }
        }
    }
    
    add_action('init', 'sv_register_acf_blocks');

    add_filter('timber/context', 'add_to_context');

    add_filter('timber/twig', function($twig) {
        // Voeg de WordPress wp_head functie toe aan Twig
        $twig->addFunction(new \Twig\TwigFunction('wp_head', function() {
            ob_start();
            wp_head();  // Zorg dat wp_head wordt aangeroepen en de output wordt teruggegeven
            return ob_get_clean();
        }));
    
        // Voeg wp_footer toe voor hetzelfde effect in de footer
        $twig->addFunction(new \Twig\TwigFunction('wp_footer', function() {
            ob_start();
            wp_footer();
            return ob_get_clean();
        }));
    
        return $twig;
    });

    


