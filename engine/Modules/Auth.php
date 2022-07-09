<?php

namespace engine\Modules;

use app\Models\User;
use engine\Database\QB;
use engine\Helper\Cookie;

class Auth
{
    protected $qb;

    public function __construct()
    {
        $this->qb = new QB();
    }

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

    public function reg($email, $password)
    {
        User::create([
            'email' => $email,
            'password' => md5($password)
        ]);
    }

    public function regNotification()
    {
        // reg notification ...
    }

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

    public function logout()
    {
        if(Cookie::get('auth')) {
            Cookie::delete('auth');
            return true;
        }
        return false;
    }

    public function redirect()
    {
        // redirect to ...
    }
}