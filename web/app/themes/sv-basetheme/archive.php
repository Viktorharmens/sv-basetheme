<?php

use Timber\Timber;

$context = Timber::context();
$context['title'] = get_the_archive_title();

Timber::render(['archive-' . get_post_type() . '.twig', 'archive.twig', 'index.twig'], $context);
