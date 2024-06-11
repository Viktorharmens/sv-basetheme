<?php

    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;

    error_reporting(E_ALL);
    ini_set('display_errors', 'true');

    include_once 'functions/functions.php';
    include_once 'functions/acf.php';
    include_once 'functions/cpt.php';
    include_once 'functions/posts.php';
    include_once 'functions/init.php';
    include_once 'functions/navigation.php';

    function sv_register_acf_blocks() {
        /**
         * We register our block's with WordPress's handy
         * register_block_type();
         *
         * @link https://developer.wordpress.org/reference/functions/register_block_type/
         */
        register_block_type( __DIR__ . '/blocks/test' );
        register_block_type( __DIR__ . '/blocks/gallery' );
    }
    // Here we call our tt3child_register_acf_block() function on init.
    add_action( 'init', 'sv_register_acf_blocks' );

    


