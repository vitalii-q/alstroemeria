<?php

namespace app\Controllers\Auth;

use app\Engine\Database\QB;
use app\Engine\Foundation\Controller;
use app\Engine\Helper\Cookie;

class LoginController extends Controller
{
    public function index() {
        var_dump($_COOKIE);

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
                ->update(['hash', $hash])->exe();

            Cookie::set('auth_user', $hash); // у echo 'Incorrect email or password.';станавливаем куки авторизации

            //header('Location: /'); // редирект
            echo true;
        } else {
            echo 'Incorrect email or password.';
        }

        //echo json_encode($user->name); // преобрахование в json и ответ в js
    }
}