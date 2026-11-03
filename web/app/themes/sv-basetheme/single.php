<?php

use Timber\Timber;

$context = Timber::context();

Timber::render(['single-' . $context['post']->post_type . '.twig', 'single.twig'], $context);
