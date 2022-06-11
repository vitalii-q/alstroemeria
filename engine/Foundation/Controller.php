<?php

namespace engine\Foundation;

use engine\DI;

abstract class Controller
{
    /**
     * @var mixed|null
     */
    protected $view;

    /**
     * Distributing dependencies to controllers
     *
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->view = $di->get('view');
    }
}

