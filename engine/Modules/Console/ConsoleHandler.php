<?php

namespace engine\Modules\Console;

class ConsoleHandler
{
    use CommandFinder;

    /**
     * Request class
     *
     * @var
     */
    protected $request;

    /**
     * Command class
     *
     * @var
     */
    protected $commands;

    /**
     * Construct request and get commands
     *
     * @param $request
     * @param $commands
     */
    public function __construct($request, $commands)
    {
        $this->request = $request;
        $this->commands = $commands->getCommands();
    }

    /**
     * Handle command
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $command = $this->getCommand($this->request->getName());
        $command->setParameters($this->request->getParameters());
        $command->handle();
    }
}