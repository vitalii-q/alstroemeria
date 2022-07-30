<?php

namespace engine\Helper;

class Cookie
{
    /**
     * Setting cookie
     *
     * @param $key
     * @param $value
     * @param $time
     * @return void
     */
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() + $time, '/'); // четвертый параметр указывает на какой странице хранить куки включаа дочерние
    }

    /**
     * Getting cookie
     *
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        if(isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }

    /**
     * Deleting cookie
     *
     * @param $key
     * @return void
     */
    public static function delete($key)
    {
        if(isset($_COOKIE[$key])) {
            setcookie($key, "", time() - 100, '/'); // устанавливаем куку с отрицательным временем что бы она уничтожилась в браузере
        }
    }
}