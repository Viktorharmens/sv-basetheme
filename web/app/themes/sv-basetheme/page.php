<?php

use Timber\Timber;

$context = Timber::context();

Timber::render(['page-' . $context['post']->slug . '.twig', 'page.twig'], $context);
