<?php

namespace engine\Modules\Console;

class ConsoleHandler
{
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
        $command = $this->command();
        $command->setParameters($this->request->getParameters());
        $command->handle();
    }

    /**
     * Find command and return
     *
     * @return mixed
     * @throws \Exception
     */
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