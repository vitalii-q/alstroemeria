<?php

namespace engine\DIModules\View;

class View
{
    protected $services;

    protected $theme;

    public function __construct($services)
    {
        $this->services = $services;

        if($services->issetService('Middleware')) { // если подключено среднее ПО
            $dataProvider = $this->services->getService('Middleware');
            $dataProvider->boot(); // запускаем скрипты среднего ПО
        }

        $this->theme = new Theme($services);
    }

    /**
     * Display template body
     *
     * @param $template
     * @param $data
     * @return void
     */
    public function render($template, $data = []) {
        /**
         * TODO: парсер переменных в шаблонах формата {{ $data['user']['name'] }}
         * TODO: буферизация
         * TODO: мультиязычность
         */

        $templatePath = $this->getTemplatePath($template);

        if(!file_exists($templatePath)) {
            throw  new \ InvalidArgumentException(
                sprintf('Template %s not found in "%s"', $template, $templatePath)
            );
        }

        require_once $templatePath; // выводим шаблон // переменная $data включена
    }

    /**
     * Getting template path
     *
     * @param $template
     * @return string
     */
    public function getTemplatePath($template): string
    {
        return 'resources/views/' . $template . '.php';
    }
}