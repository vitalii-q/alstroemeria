<?php

namespace engine\Modules\Console;

class Request
{
    protected $name;

    protected $parameters = [];

    public function __construct()
    {
        $argv = $_SERVER['argv'];

        $this->name = $argv[1];

        if (isset($argv[2])) {
            unset($argv[0], $argv[1]); $i = 1;

            foreach ($argv as $param) {
                $this->parameters['param'.$i++] = $param;
            }
        }
    }
}