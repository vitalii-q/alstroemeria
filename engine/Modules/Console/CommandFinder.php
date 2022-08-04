<?php

namespace engine\Modules\Console;

trait CommandFinder
{
    /**
     * Find command and return
     *
     * @return mixed
     * @throws \Exception
     */
    public function getCommand($name)
    {
        foreach ($this->commands as $command) {
            if ($command->getName() == $name) {
                return $command;
            }
        }

        return throw new \Exception(
            sprintf('Command <strong>%s</strong> does not exist.', $this->command->getName())
        );
    }
}