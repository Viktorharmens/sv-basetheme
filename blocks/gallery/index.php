<?php
$context = Timber::context();
$context['block'] = $block;
$context['fields'] = get_fields();
Timber::render('blocks/gallery/index.twig', $context);