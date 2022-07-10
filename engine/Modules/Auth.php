<?php

namespace engine\Modules;

use app\Models\User;
use engine\Database\QB;
use engine\Helper\Cookie;

class Auth
{
    /**
     * Query builder variable
     *
     * @var QB
     */
    protected $qb;

    /**
     * Construct query builder
     */
    public function __construct()
    {
        $this->qb = new QB();
    }

    /**
     * User existence check
     *
     * @param $email
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function userCheck($email, $password)
    {
        $user = $this->qb->table('user')
            ->where('email', $email)
            ->where('password', md5($password))
            ->first()
            ->exe();

        if (!$user) {
            return false;
        }
        return true;
    }

    /**
     * User registration
     *
     * @param $email
     * @param $password
     * @return void
     */
    public function reg($email, $password)
    {
        User::create([
            'email' => $email,
            'password' => md5($password)
        ]);
    }

    /**
     * Notification for user about registration
     *
     * @return void
     */
    public function regNotification()
    {
        // reg notification ...
    }

    /**
     * User authentication
     *
     * @param $email
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function login($email, $password)
    {
        $hash = md5($email . $password . (string)rand(10000000, 99999999));

        $this->qb->table('user')
            ->where('email', $email)
            ->where('password', md5($password))
            ->update(['hash' => $hash])->exe();

        Cookie::set('auth', $hash); // устанавливаем куки авторизации

        return true;
    }

    /**
     * User un authentication
     *
     * @return bool
     */
    public function logout()
    {
        if(Cookie::get('auth')) {
            Cookie::delete('auth');
            return true;
        }
        return false;
    }

    /**
     * Redirect user to ...
     *
     * @return void
     */
    public function redirect()
    {
        // redirect to ...
    }
}