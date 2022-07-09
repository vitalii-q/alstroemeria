<?php

namespace app\Controllers\Auth;

use engine\Foundation\Controller;
use engine\Modules\Auth;
use engine\Support\Facades\AuthFacade;

class LoginController extends Controller
{
    public function index() {
        $this->view->render('auth/login');
    }

    /**
     * @throws \Exception
     */
    public function login($request) {
        $auth = new AuthFacade(new Auth());
        $auth->login($request['email'], $request['password']);

        //echo json_encode($user->name); // преобрахование в json и ответ в js
    }

    public function logout ()
    {
        $auth = new AuthFacade(new Auth());
        $auth->logout();
    }
}