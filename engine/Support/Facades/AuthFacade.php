<?php

namespace engine\Support\Facades;

use engine\Modules\Auth;

class AuthFacade // ПП Facade
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function login($email, $password)
    {
        $userCheck = $this->auth->userCheck($email, $password);

        if($userCheck) {
            $this->auth->login($email, $password);

            echo true;
        } else {
            echo 'Incorrect email or password.';
        }
    }

    public function logout()
    {
        $this->auth->logout();
        $this->auth->redirect();
    }

    public function reg($email, $password)
    {
        if(!$this->auth->userCheck($email, $password)) {
            $this->auth->reg($email, $password);
        }

        $this->auth->regNotification();
    }
}