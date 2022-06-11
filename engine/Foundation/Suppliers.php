<?php

namespace engine\Foundation;

use engine\DIModules\View\Theme;

abstract class Suppliers
{
    /**
     * @var Theme
     */
    protected $theme;

    /**
     * Distributing theme service to suppliers
     *
     * @param Theme $theme
     */
    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
    abstract public function supply();
}