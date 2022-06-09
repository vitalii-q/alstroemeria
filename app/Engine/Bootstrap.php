<?php

require_once __DIR__ . "/../../vendor/autoload.php"; // __DIR__ директория этого файла

use app\Engine\DI;
use app\Engine\App;

try {
    /**
     * TODO: Middleware -> Auth: Route:group[Auth]
     * TODO: Посмотреть про ПП singleton (в laravel middleware запускается через singleton)
     * TODO: PHPdoc
     * TODO: PHPunit
     */

    $di = new DI(); // Dependency injection

    /**
     * TODO: проверить как можно вытащить сразу нужную часть массива - DI
     */
    $providers = require 'config/architecture.php';

    foreach ($providers['DI'] as $provider) {
        $moduleProvider = new $provider($di);
        $moduleProvider->init(); // инициализация сервиса
    }

    //$query = "SELECT * FROM alstroemeria.user WHERE email = 'user1@mail.ru' OR email = 'user@mail.ru'";
    //var_dump($di->get('db')->query($query, ['12'])); // query

    //var_dump($di);
    //echo '<br>';
    //var_dump($services);
    //exit();

    $app = new App($di);
    $app->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}

