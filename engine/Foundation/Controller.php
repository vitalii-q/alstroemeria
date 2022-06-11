<?php

namespace engine\Foundation;

use engine\DI;

abstract class Controller
{
    protected $view;

    public function __construct(DI $di)
    {
        $this->view = $di->get('view');
    }
}