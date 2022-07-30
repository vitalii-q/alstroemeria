<?php

namespace engine\Helper;

class Common
{

    /**
     * Getting current path
     *
     * @return mixed
     */
    static public function getPath() {
        return $_SERVER['REQUEST_URI'];
    }
}