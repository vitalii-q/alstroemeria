<?php

namespace app\Controllers\Auth;

use engine\Database\QB;
use engine\Foundation\Controller;
use engine\Helper\Cookie;

class LoginController extends Controller
{
    public function index() {
        $this->view->render('auth/login');
    }

    /**
     * @throws \Exception
     */
    public function login($request) {
        $qb = new QB();
        $user = $qb->table('user')
            ->where('email', $request['email'])
            ->where('password', md5($request['password']))
            ->first()
            ->exe();

        if($user) {
            $hash = md5($user->email . $user->password . (string)rand(10000000, 99999999));

            $qb->table('user')
                ->where('email', $request['email'])
                ->where('password', md5($request['password']))
                ->update(['hash' => $hash])->exe();

            Cookie::set('auth', $hash); // устанавливаем куки авторизации

            echo true;
        } else {
            echo 'Incorrect email or password.';
        }

        //echo json_encode($user->name); // преобрахование в json и ответ в js
    }

    public function logout ()
    {
        if(Cookie::get('auth')) {
            Cookie::delete('auth');
            echo true;
        }
    }
}