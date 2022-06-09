<?php

namespace app\Engine\Foundation;

use App\Engine\DI;

abstract class Controller
{
    protected $view;

    public function __construct(DI $di)
    {
        $this->view = $di->get('view');
    }
}