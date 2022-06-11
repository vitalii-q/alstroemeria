<?php

namespace app\Controllers\Admin;

use engine\Foundation\Controller;
use engine\Helper\Cookie;

class AdminController
{
    public function __construct()
    {
        if(!Cookie::get('auth')) {
            header('Location: /login'); // редирект
        }
    }

    public function index()
    {
        echo 'admin';
    }
}