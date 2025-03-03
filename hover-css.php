<?php

class Jankx_HoverCSS {
    public function load() {
    }
}

$hoverCSS = new Jankx_HoverCSS();


add_action('jankx/frontend/init', [$hoverCSS, 'load']);
