<?php

use Timber\Timber;

$context = Timber::context();
$context['title'] = sprintf(__('Zoekresultaten voor “%s”', 'sv-basetheme'), get_search_query());

Timber::render(['search.twig', 'archive.twig'], $context);
