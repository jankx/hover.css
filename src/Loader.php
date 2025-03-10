<?php

namespace Jankx\HoverCss;

use Jankx\Adapter\Options\Helper;

class Loader
{
    protected static $instance;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }


    public function init()
    {
        if (Helper::getOption('hover_css_navigation_enabled', true)) {
            $navigation = new Navigation();
            $navigation->setMenuHoverStyle(Helper::getOption('nav_item_hover_style', 'hvr-underline-from-left'));

            add_filter('nav_menu_link_attributes', [$navigation, 'addedHoverCssClassToNav'], 100, 4);
        }
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
        add_filter('jankx_asset_css_dependences', function ($deps) {
            $deps[] = 'jankx-hover.css';

            return $deps;
        });
    }


    public function registerScripts()
    {
        css('jankx-hover.css', [
            'url' => implode('/', [jankx_get_path_url(dirname(JANKX_HOVER_CSS_FILE)), 'assets/Hover-2.3.1/css/hover.css']),
            'url.min' => implode('/', [jankx_get_path_url(dirname(JANKX_HOVER_CSS_FILE)), 'assets/Hover-2.3.1/css/hover.min.css'])
        ], [], '2.3.1');
    }
}
