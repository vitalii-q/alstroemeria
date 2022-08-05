<?php

namespace engine\Modules\Console;

use engine\Helper\Finder;

class Commands
{
    /**
     * All commands
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Finder class
     *
     * @var Finder
     */
    protected $finder;

    /**
     * Default commands path
     *
     * @var string
     */
    protected $defCommandsPath = ROOT_DIR.'engine/Modules/Console/CommandsDefault';

    /**
     * Commands path
     *
     * @var string
     */
    protected $commandsPath = ROOT_DIR.'app/Console/Commands';

    /**
     * Start getting commands
     */
    public function __construct()
    {
        $this->finder = new Finder();

        $this->setCommands();
    }

    /**
     * Set command to variable
     *
     * @return void
     */
    public function setCommands()
    {
        $files = array_merge(
            $this->finder->findFiles($this->defCommandsPath),
            $this->finder->findFiles($this->commandsPath)
        );

        foreach ($files as $str) {
            $command = str_replace('.php', '', str_replace('/', '\\', $str));
            $obj = new $command;

            $this->commands[$obj->getName()] = $obj;
        }
    }

    /**
     * Get commands
     *
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }
}