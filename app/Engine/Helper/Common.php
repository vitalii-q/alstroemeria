<?php

namespace app\Engine\Helper;

class Common
{
    public function getPath() {
        return $_SERVER['REQUEST_URI'];
    }
}