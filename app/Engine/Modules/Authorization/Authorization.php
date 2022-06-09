<?php

namespace app\Engine\Modules\Authorization;

use app\Engine\Helper\Cookie;

class Authorization
{
    /**
     * Класс не учавствует в авторизации
     * TODO: auth - усилить авторизацию
     */

    protected $authorized = false;

    public function authorized() // статус авторизации
    {
        return $this->authorized;
    }

    public function authorize($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }
}