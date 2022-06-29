<?php

namespace engine\Helper;

class Env
{
    private static $class;

    private static $env_file = ROOT_DIR . '/.env';

    private function __construct() {}

    private function __clone() {}

    public static function get($setting, $default = null)
    {
        if(is_null(self::$class)) {
            self::$class = new self();
        }

        foreach (file(self::$env_file) as $string) { // file получение строк файла массивом
            $strExp = explode('=', $string);

            if($strExp[0] === $setting) {
                return $strExp[1];
            }
        }

        return $default;
    }
}