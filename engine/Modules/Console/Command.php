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

        $this->parameters = array_combine($result[1], $parameters); // комбинируем массив ключей и значений
    }

    public function argument($arg)
    {
        return $this->parameters[$arg];
    }


}