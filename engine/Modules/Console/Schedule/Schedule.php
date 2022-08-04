<?php

namespace engine\Modules\Console\Schedule;

use engine\Modules\Console\CommandFinder;
use engine\Modules\Console\Commands;

class Schedule
{
    use CommandFinder;

    protected $commands = [];

    protected $tasks = [];

    protected $time;

    protected $checkTime;

    public function __construct()
    {
        $this->checkTime = new ScheduleCheckTime();
        $this->time = date('i:G:j:n:d');

        $commands = new Commands();
        $this->commands = $commands->getCommands();
    }

    public function command($signature)
    {
        $signatureExp = explode(' ', $signature);
        $command = $this->getCommand($signatureExp[0]);

        $this->tasks[] = $command;

        return $command;
    }

    public function run()
    {
        foreach ($this->tasks as $task) {
            if ($this->checkActivationTime($task)) {
                //var_dump($task->getFrequency());
                //var_dump($task);
            }

        }
        //var_dump($this->tasks);
    }

    public function checkActivationTime($task)
    {
        var_dump($this->time);

        return true;
    }
}