<?php

namespace engine\DIModules\View;

class Theme
{
    protected $header = ROOT_DIR . '/resources/views/themes/default/header.php';

    protected $footer = ROOT_DIR . '/resources/views/themes/default/footer.php';

    protected $services;

    protected $variables;

    public function __construct($services)
    {
        $this->services = $services;

        if($this->services->issetService('DataProvider')) { // если подключен проводник данных
            $dataProvider = $this->services->getService('DataProvider');
            $dataProvider->boot($this); // наполняем класс theme переменными
        }
    }

    /**
     * Header display
     *
     * @return void
     */
    public function header()
    {
        if($this->services->issetService('DataProvider')) {
            extract($this->variables); // импортируем переменные в функцию
        }

        require_once $this->header;
    }

    /**
     * Footer display
     *
     * @return void
     */
    public function footer()
    {
        if($this->services->issetService('DataProvider')) {
            extract($this->variables); // импортируем переменные в функцию
        }

        require_once $this->footer;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setVariable($key, $value)
    {
        return $this->variables[$key] = $value;
    }
}