<?php

namespace Jankx\HoverCss;

use Jankx\Adapter\Options\Helper;

class Navigation
{
    protected $menuHoverStyle;

    public function addedHoverCssClassToNav($atts, $menu_item, $args, $depth)
    {
        if (!apply_filters("jankx/navigation/hovercss/{$args->theme_location}", $depth <= 0, $args, $menu_item, $depth) || empty($this->menuHoverStyle)) {
            return $atts;
        }
        if (!isset($atts['class'])) {
            $atts['class'] = '';
        }
        $atts['class'] .= $this->menuHoverStyle;
        return $atts;
    }

    public function setMenuHoverStyle($menuHoverStyle)
    {
        $this->menuHoverStyle = $menuHoverStyle;
    }
}
