<?php

/**
 * Bootstrap file - файл начальной загрузки
 *
 * TODO: PHPunit
 */

require_once __DIR__ . "/../vendor/autoload.php"; // __DIR__ директория этого файла

use engine\DI;
use engine\App;
use engine\Helper\Get\Configs;
use engine\Modules\Log;

$log = new Log();

try {
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
    $log->logging($e->getMessage());
    echo $e->getMessage();
}

