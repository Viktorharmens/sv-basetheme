<?php

use Timber\Timber;

$context = Timber::context();

Timber::render(['front-page.twig', 'page.twig'], $context);
