<?php

namespace Jankx\Hovercss;

class Loader
{
    protected $instance;

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
}
