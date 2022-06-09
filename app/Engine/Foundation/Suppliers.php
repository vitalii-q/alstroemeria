<?php

namespace app\Engine\Foundation;

use app\Engine\DIModules\View\Theme;

abstract class Suppliers
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    abstract public function supply();
}