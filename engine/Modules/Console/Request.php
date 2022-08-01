<?php

namespace engine\Modules\Console;

class Request
{
    /**
     * @var mixed
     */
    protected $name;

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * Construct request and parameters
     */
    public function __construct()
    {
        $argv = $_SERVER['argv'];

        $this->name = $argv[1];

        if (isset($argv[2])) {
            unset($argv[0], $argv[1]); $i = 0;

            foreach ($argv as $param) {
                $this->parameters[$i++] = $param;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}