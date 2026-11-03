<?php

if (! defined('ABSPATH')) {
    exit;
}

// Bump bij elke release (semver); wordt gebruikt voor cache-busting van de assets.
define('SITE_VERSION', '2.0.0');

Timber\Timber::init();

(new SV\Theme\Theme())->boot();
