<?php

namespace engine\Helper;

class Session
{
    /**
     * Setting sessions, max four lvl
     *
     * @param $path
     * @param $value
     * @return void
     */
    public function set($path, $value)
    {
        $pathExp = explode('.', $path);

        /**
         * Вариант кода с записью в разные уровни массива (4 уровня)
         */
        if(count($pathExp) >= 1 and (!is_array($_SESSION) or
            !array_key_exists($pathExp[0], $_SESSION)))
        {
            if(count($pathExp) == 1) {
                if(!is_array($_SESSION)) {
                    $_SESSION = [];
                }

                $_SESSION[$pathExp[0]] = $value;
            } else {
                array_push($_SESSION[$pathExp[0]], []);
            }
        }
        if(count($pathExp) >= 2 and (!is_array($_SESSION[$pathExp[0]]) or
            !array_key_exists($pathExp[1], $_SESSION[$pathExp[0]])))
        {
            if(count($pathExp) == 2) {
                if(!is_array($_SESSION[$pathExp[0]])) {
                    $_SESSION[$pathExp[0]] = [];
                }

                $_SESSION[$pathExp[0]][$pathExp[1]] = $value;
            } else {
                if (count($pathExp) > 2 and !is_array($_SESSION[$pathExp[0]])) {
                    $_SESSION[$pathExp[0]] = [];
                }

                array_push($_SESSION[$pathExp[0]][$pathExp[1]], []);
            }
        }
        if(count($pathExp) >= 3 and (!is_array($_SESSION[$pathExp[0]][$pathExp[1]]) or
            !array_key_exists($pathExp[2], $_SESSION[$pathExp[0]][$pathExp[1]])))
        {
            if(count($pathExp) == 3) {
                if(!is_array($_SESSION[$pathExp[0]][$pathExp[1]])) {
                    $_SESSION[$pathExp[0]][$pathExp[1]] = [];
                }

                $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]] = $value;
            } else {
                if(count($pathExp) > 3 and !is_array($_SESSION[$pathExp[0]][$pathExp[1]])) {
                    $_SESSION[$pathExp[0]][$pathExp[1]] = [];
                }

                array_push($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]], []);
            }
        }
        if(count($pathExp) >= 4 and (!is_array($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]]) or
            !array_key_exists($pathExp[3], $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]])))
        {
            if(count($pathExp) == 4) {
                if(!is_array($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]])) {
                    $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]] = [];
                }

                $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]][$pathExp[3]] = $value;
            } else {
                array_push($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]][$pathExp[3]], $value);
            }
        }

        return;

        /**
         * Альтернативный код, выдает ошибку:
         * Illegal string offset 'view2' in /engine/Helper/Session.php
         * и не делает запись
         */
        switch (count($pathExp)) {
            case 1: $_SESSION[$pathExp[0]] = $value; break;
            case 2: $_SESSION[$pathExp[0]][$pathExp[1]] = $value; break;
            case 3: $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]] = $value; break;
            case 4: $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]][$pathExp[3]] = $value;
        }
    }

    /**
     * Availability check sessions
     *
     * @param $path
     * @return bool|void
     */
    public function isset($path)
    {
        $pathExp = explode('.', $path);

        switch (count($pathExp)) {
            case 1: return isset($_SESSION[$pathExp[0]]);
            case 2: return isset($_SESSION[$pathExp[0]][$pathExp[1]]);
            case 3: return isset($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]]);
            case 4: return isset($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]][$pathExp[3]]);
        }
    }

    /**
     * Getting sessions
     *
     * @param $path
     * @return mixed|void
     */
    public function get($path)
    {
        $pathExp = explode('.', $path);

        switch (count($pathExp)) {
            case 1: return $_SESSION[$pathExp[0]];
            case 2: return $_SESSION[$pathExp[0]][$pathExp[1]];
            case 3: return $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]];
            case 4: return $_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]][$pathExp[3]];
        }
    }

    /**
     * Unsetting sessions
     *
     * @param $path
     * @return void
     */
    public function unset($path)
    {
        $pathExp = explode('.', $path);

        switch (count($pathExp)) {
            case 1: unset($_SESSION[$pathExp[0]]); break;
            case 2: unset($_SESSION[$pathExp[0]][$pathExp[1]]); break;
            case 3: unset($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]]); break;
            case 4: unset($_SESSION[$pathExp[0]][$pathExp[1]][$pathExp[2]][$pathExp[3]]); break;
        }
    }
}