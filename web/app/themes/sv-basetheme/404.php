<?php

use Timber\Timber;

$context = Timber::context();
$context['title'] = __('Pagina niet gevonden', 'sv-basetheme');

Timber::render(['404.twig'], $context);
