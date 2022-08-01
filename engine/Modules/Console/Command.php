<?php

namespace engine\Modules\Console;

class Command
{
    /**
     * Get the command name
     *
     * @return mixed
     */
    public function getName()
    {
        return explode(' ',$this->signature)[0];
    }

    public function setParameters()
    {
        var_dump('1');
    }
}