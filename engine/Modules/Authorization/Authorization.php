<?php

namespace engine\Modules\Authorization;

use engine\Helper\Cookie;

class Authorization
{
    /**
     * Класс не учавствует в авторизации
     * TODO: auth - усилить авторизацию
     */

    /**
     * @var bool
     */
    protected $authorized = false;

    /**
     * Check authorization status
     *
     * @return bool
     */
    public function authorized() // статус авторизации
    {
        return $this->authorized;
    }

    /**
     * Authorization
     *
     * @param $user
     * @return void
     */
    public function authorize($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    /**
     * Un authorization
     *
     * @return void
     */
    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    /**
     * Getting random number
     *
     * @return string
     */
    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }
}