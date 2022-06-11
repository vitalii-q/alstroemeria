<?php
namespace engine\DIProviders;

use engine\DIModules\Database\Connection;

class DatabaseProvider extends ModuleProvider
{
    private $serviceName = 'Configs';

    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}