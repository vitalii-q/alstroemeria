<?php

namespace engine\Modules\Http;

class Request
{
    /**
     * Getting request info
     *
     * @return array
     */
    public static function request() {
        return $_REQUEST;
    }
}