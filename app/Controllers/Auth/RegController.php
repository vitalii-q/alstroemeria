<?php

namespace app\Controllers\Auth;

use engine\Foundation\Controller;
use app\Models\User;
use engine\Modules\Auth;
use engine\Support\Facades\AuthFacade;

class RegController extends Controller
{
    public function index() {
        $this->view->render('auth/registration');
    }

    public function registration($request) {
        $auth = new AuthFacade(new Auth());
        $auth->reg($request['email'], $request['password']);
    }
}

