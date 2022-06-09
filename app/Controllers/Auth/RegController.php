<?php

namespace app\Controllers\Auth;

use app\Engine\Foundation\Controller;
use app\Models\User;

class RegController extends Controller
{
    public function index() {
        $this->view->render('auth/registration');
    }

    public function registration($request) {
        if(!User::where('email', $request['email'])) {
            User::create([
                'email' => $request['email'],
                'password' => md5($request['password'])
            ]);
        }
    }
}

