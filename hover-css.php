<?php

use Jankx\HoverCss\Loader;

if (!defined('JANKX_HOVER_CSS_FILE')) {
    define('JANKX_HOVER_CSS_FILE', __FILE__);
}

class Jankx_HoverCSS
{
    public function load()
    {
        $loader = Loader::getInstance();
        add_action('init', [$loader, 'init']);
    }
}

$hoverCSS = new Jankx_HoverCSS();
$hoverCSS->load();
