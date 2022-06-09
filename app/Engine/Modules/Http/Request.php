<?php

namespace app\Engine\Modules\Http;

class Request
{
    /**
     * @return array
     */
    public static function request() {
        return $_REQUEST;
    }
}