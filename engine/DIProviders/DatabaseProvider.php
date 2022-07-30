<?php
namespace engine\DIProviders;

use engine\DIModules\Database\Connection;

class DatabaseProvider extends ModuleProvider
{
    /**
     * @var string
     */
    private $serviceName = 'Config';

    /**
     * Initializing the database connection module
     *
     * @return void
     */
    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}