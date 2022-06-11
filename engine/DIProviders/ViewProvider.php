<?php

namespace engine\DIProviders;

use engine\DIModules\View\View;
use engine\Foundation\Services;
use engine\Helper\Get\Configs;

class ViewProvider extends ModuleProvider
{
    protected $serviceName = 'view';

    public function init()
    {
        $config = Configs::getInstance()->get('arch');

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