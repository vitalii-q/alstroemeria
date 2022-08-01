<?php

namespace engine\Modules\Console;

class Commands
{
    protected $commands = [];

    protected $finder;

    public function __construct()
    {
        $this->finder = new Finder();

        $this->setCommands();
        $this->setDefaultCommands();
    }

    public function setCommands()
    {

    }

    public function setDefaultCommands()
    {

    }
}