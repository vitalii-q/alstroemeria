<?php

namespace engine\Support\Facades;

use engine\Modules\Auth;

class AuthFacade // ПП Facade
{
    /**
     * Auth class variable
     *
     * @var Auth
     */
    private $auth;

    /**
     * Auth class construct
     *
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Login user events
     *
     * @param $email
     * @param $password
     * @return void
     * @throws \Exception
     */
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

    /**
     * User logout events
     *
     * @return void
     */
    public function logout()
    {
        $this->auth->logout();
        $this->auth->redirect();
    }

    /**
     * User registration events
     *
     * @param $email
     * @param $password
     * @return void
     * @throws \Exception
     */
    public function reg($email, $password)
    {
        if(!$this->auth->userCheck($email, $password)) {
            $this->auth->reg($email, $password);
        }

        $this->auth->regNotification();
    }
}