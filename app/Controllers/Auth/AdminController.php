<?php

namespace app\Controllers\Auth;

use App\Engine\DI;
use app\Engine\Foundation\Controller;

class AdminController extends Controller
{
    public function __construct(DI $di)
    {
        /**
         * TODO: Auth admin
         */
        parent::__construct($di);
    }
}