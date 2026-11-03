<?php

namespace SV\Theme;

/**
 * Start alle onderdelen van het thema.
 */
class Theme
{
    /** @var class-string[] */
    private array $modules = [
        Setup::class,
        Assets::class,
        Context::class,
        Blocks::class,
        Editor::class,
        Comments::class,
        Cleanup::class,
        Fields\Options::class,
    ];

    public function boot(): void
    {
        foreach ($this->modules as $module) {
            (new $module())->register();
        }
    }
}
