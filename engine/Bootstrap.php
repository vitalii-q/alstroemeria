<?php

require_once __DIR__ . "/../vendor/autoload.php"; // __DIR__ директория этого файла

use engine\DI;
use engine\App;
use engine\Helper\Get\Configs;

try {
    /**
     * Bootstrap file - файл начальной загрузки
     *
     * TODO: PHPdoc
     * TODO: PHPunit
     */
    session_start();

    $di = new DI(); // Dependency injection

    $providers = Configs::getInstance()->get('arch');

    foreach ($providers['DI'] as $provider) {
        $moduleProvider = new $provider($di);
        $moduleProvider->init(); // инициализация сервиса
    }

    $app = new App($di);
    $app->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}

