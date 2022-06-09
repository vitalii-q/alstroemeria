<?php
namespace app\Engine\DIProviders;

use app\Engine\DIModules\Database\Connection;

class DatabaseProvider extends ModuleProvider
{
    private $serviceName = 'db';

    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}