<?php

namespace engine\Foundation;

use engine\DIModules\View\Theme;

abstract class Middleware
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    abstract public function supply();
}