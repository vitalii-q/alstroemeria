<?php

namespace engine\Modules\Console\Schedule;

use engine\Modules\Console\Command;
use engine\Modules\Console\CommandFinder;
use engine\Modules\Console\Commands;
use engine\Modules\Console\ManagerFrequencies;

class Schedule
{
    use CommandFinder;

    protected $commands = [];

    protected $tasks = [];

    protected $timeChecker;

    public function __construct()
    {
        $this->timeChecker = new TaskTimeChecker();

        $commands = new Commands();
        $this->commands = $commands->getCommands();
    }

    public function command($signature)
    {
        $signatureExp = explode(' ', $signature);
        $command = $this->getCommand($signatureExp[0]);

        $this->tasks[] = $command;

        var_dump(get_class($command));
        $q = get_class($command);
        //exit();
        $comm = new Command();

        //return $command;
        //return new $q;
        return $comm;
    }

    public function run()
    {
        foreach ($this->tasks as $task) {
            if ($this->timeChecker->checkActivationTime($task->getFrequency())) {
                $task->handle();
            }

        }

        //var_dump($this->tasks);
    }
}