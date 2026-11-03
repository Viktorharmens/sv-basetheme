<?php

namespace SV\Theme;

use StoutLogic\AcfBuilder\FieldsBuilder;
use Timber\Timber;

/**
 * Registreert elke map in blocks/ als ACF-block.
 *
 * Een block bestaat uit block.json, index.twig en optioneel fields.php,
 * dat een StoutLogic FieldsBuilder teruggeeft.
 */
class Blocks
{
    /** Core-blocks die naast de eigen blocks beschikbaar zijn in de editor. */
    private const CORE_BLOCKS = [
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/list-item',
        'core/quote',
        'core/image',
        'core/buttons',
        'core/button',
        'core/separator',
        'core/embed',
    ];

    public function register(): void
    {
        add_action('init', [$this, 'registerBlocks']);
        add_action('acf/init', [$this, 'registerFields']);
        add_filter('allowed_block_types_all', [$this, 'allowedBlocks'], 25);
    }

    public function registerBlocks(): void
    {
        foreach ($this->directories() as $dir) {
            register_block_type($dir);
        }
    }

    public function registerFields(): void
    {
        foreach ($this->directories() as $dir) {
            if (! file_exists($dir . '/fields.php')) {
                continue;
            }

            /** @var FieldsBuilder $fields */
            $fields = require $dir . '/fields.php';
            $fields->setLocation('block', '==', 'acf/' . basename($dir));

            acf_add_local_field_group($fields->build());
        }
    }

    public function allowedBlocks(): array
    {
        $custom = array_map(fn(string $dir) => 'acf/' . basename($dir), $this->directories());

        return [...self::CORE_BLOCKS, ...$custom];
    }

    /**
     * renderCallback voor alle blocks (zie block.json).
     */
    public static function render(array $block, string $content = '', bool $isPreview = false, int $postId = 0): void
    {
        $slug = str_replace('acf/', '', $block['name']);

        $context = Timber::context();
        $context['block'] = $block;
        $context['fields'] = get_fields() ?: [];
        $context['is_preview'] = $isPreview;
        $context['post_id'] = $postId;

        Timber::render("blocks/{$slug}/index.twig", $context);
    }

    /** @return string[] */
    private function directories(): array
    {
        return glob(get_template_directory() . '/blocks/*', GLOB_ONLYDIR) ?: [];
    }
}
