<?php

namespace engine\Modules\Console;

class Command
{
    /**
     * Passed parameters
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Get the command name
     *
     * @return mixed
     */
    public function getName()
    {
        return explode(' ',$this->signature)[0];
    }

    /**
     * Set command parameters
     *
     * @param $parameters
     * @return void
     */
    public function setParameters($parameters)
    {
        preg_match_all('/\{([A-Za-z0-9]+)\}/', $this->signature, $result); // получаем содержимое между {}

        $i = 0;
        while ($i < count($result[1]) and $i < count($parameters)) {
            $this->parameters[$result[1][$i]] = $parameters[$i];
            $i++;
        }
    }

    public function argument($arg)
    {
        return $this->parameters[$arg];
    }


}