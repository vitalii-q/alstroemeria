<?php

namespace app\Engine\DIProviders;

use app\Engine\DIModules\View\View;
use app\Engine\Foundation\Services;

class ViewProvider extends ModuleProvider
{
    protected $serviceName = 'view';

    public function init()
    {
        $config = require ROOT_DIR . '/config/architecture.php';

        // наполняем модуль View сервисами
        $services = new Services();
        foreach ($config['Services']['View'] as $providerName => $viewProvider) {
            $viewProviderPath = '\\' . $viewProvider;
            $provider = new $viewProviderPath();
            $services->setService($providerName, $provider);
        }

        $view = new View($services);

        $this->di->set($this->serviceName, $view);
    }
}