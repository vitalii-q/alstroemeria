<?php

namespace engine\Modules\Console\Schedule;

use engine\Modules\Console\Command;
use engine\Modules\Console\ManagerFrequencies;

class Task
{
    use ManagerFrequencies;

    /**
     * Command to execute
     *
     * @var Command
     */
    protected $command;

    /**ы
     * Frequency of task execution
     *
     * @var string
     */
    protected $frequency = '* * * * *';

    /**
     * Construct task command
     *
     * @param Command $command
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * Get task command
     *
     * @return Command
     */
    public function getCommand(): Command
    {
        return $this->command;
    }

    /**
     * Get task frequency execution
     *
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }
}