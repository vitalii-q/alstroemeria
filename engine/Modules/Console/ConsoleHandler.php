<?php

namespace engine\Modules\Console;

class ConsoleHandler
{
    protected $request;

    protected $commands;

    public function __construct($request, $commands)
    {
        $this->request = $request;
        $this->commands = $commands->getCommands();
    }

    public function handle()
    {
        $command = $this->command();
        $command->setParameters();
        $command->handle();
    }

    public function command()
    {
        foreach ($this->commands as $command) {
            if ($command->getName() == $this->request->getName()) {
                return $command;
            }
        }

        return throw new \Exception(
            sprintf('Command <strong>%s</strong> does not exist.', $this->command->getName())
        );
    }
}