<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$fields = new FieldsBuilder('text_media', ['title' => __('Tekst en afbeelding', 'sv-basetheme')]);

$fields
    ->addText('title', ['label' => __('Titel', 'sv-basetheme')])
    ->addWysiwyg('text', ['label' => __('Tekst', 'sv-basetheme'), 'media_upload' => 0, 'toolbar' => 'basic'])
    ->addImage('image', ['label' => __('Afbeelding', 'sv-basetheme'), 'return_format' => 'id', 'preview_size' => 'medium'])
    ->addButtonGroup('image_position', [
        'label' => __('Afbeelding staat', 'sv-basetheme'),
        'choices' => ['left' => __('Links', 'sv-basetheme'), 'right' => __('Rechts', 'sv-basetheme')],
        'default_value' => 'right',
    ]);

return $fields;
