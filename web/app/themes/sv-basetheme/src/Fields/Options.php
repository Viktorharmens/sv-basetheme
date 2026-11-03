<?php

namespace SV\Theme\Fields;

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Optiepagina "Site-opties" met velden die overal in het thema beschikbaar zijn als {{ options }}.
 */
class Options
{
    public function register(): void
    {
        add_action('acf/init', [$this, 'page']);
        add_action('acf/init', [$this, 'fields']);
    }

    public function page(): void
    {
        acf_add_options_page([
            'page_title' => __('Site-opties', 'sv-basetheme'),
            'menu_title' => __('Site-opties', 'sv-basetheme'),
            'menu_slug' => 'site-opties',
            'position' => 2,
            'icon_url' => 'dashicons-admin-generic',
            'redirect' => false,
        ]);
    }

    public function fields(): void
    {
        $options = new FieldsBuilder('site_options', ['title' => __('Site-opties', 'sv-basetheme')]);

        $options
            ->addTab('contact', ['label' => __('Contact', 'sv-basetheme')])
            ->addEmail('email', ['label' => __('E-mailadres', 'sv-basetheme')])
            ->addText('phone', ['label' => __('Telefoonnummer', 'sv-basetheme')])
            ->addTextarea('address', ['label' => __('Adres', 'sv-basetheme'), 'rows' => 3])
            ->addTab('social', ['label' => __('Social media', 'sv-basetheme')])
            ->addRepeater('socials', ['label' => __('Kanalen', 'sv-basetheme'), 'button_label' => __('Kanaal toevoegen', 'sv-basetheme'), 'layout' => 'table'])
                ->addText('label', ['label' => __('Naam', 'sv-basetheme')])
                ->addUrl('url', ['label' => __('Link', 'sv-basetheme')])
            ->endRepeater()
            ->addTab('footer', ['label' => __('Footer', 'sv-basetheme')])
            ->addTextarea('footer_text', ['label' => __('Tekst in de footer', 'sv-basetheme'), 'rows' => 3])
            ->setLocation('options_page', '==', 'site-opties');

        acf_add_local_field_group($options->build());
    }
}
