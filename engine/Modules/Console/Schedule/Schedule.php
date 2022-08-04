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

        $command = new Task($command);

        $this->tasks[] = $command;

        return $command;
    }

    /**
     * Running all tasks according to the schedule
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tasks as $task) {
            if ($this->timeChecker->checkActivationTime($task->getFrequency())) {
                $task->getCommand()->handle();
            }
        }
    }
}