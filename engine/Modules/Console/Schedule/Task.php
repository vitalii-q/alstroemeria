<?php

namespace engine\Modules\Console\Schedule;

use engine\Modules\Console\Command;
use engine\Modules\Console\ManagerFrequencies;

class Task
{
    use ManagerFrequencies;

    protected $command;

    protected $frequency = '* * * * *';

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * @return Command
     */
    public function getCommand(): Command
    {
        return $this->command;
    }

    /**
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }
}