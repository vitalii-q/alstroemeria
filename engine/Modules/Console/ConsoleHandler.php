<?php

namespace engine\Modules\Console;

use app\Console\Commands\UserCreate;

class ConsoleHandler
{
    protected $command;

    protected $commands;

    public function __construct($command, $commands)
    {
        $this->command = $command;
        $this->commands = $commands;
    }

    public function handle()
    {
        //var_dump(__DIR__.'/../../../app/Console/Commands');
        //var_dump(scandir(__DIR__.'/../../../app/Console/Commands'));

        $userCreate = new UserCreate();
        //var_dump($userCreate->getName());

        //var_dump($this->command);
    }
}