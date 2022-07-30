<?php

namespace engine\DIModules\View;

class Theme
{
    /**
     * Path to the header file
     *
     * @var string
     */
    protected $header = ROOT_DIR . '/resources/views/themes/default/header.php';

    /**
     * Path to the footer file
     *
     * @var string
     */
    protected $footer = ROOT_DIR . '/resources/views/themes/default/footer.php';

    /**
     * @var
     */
    protected $services;

    /**
     * @var
     */
    protected $variables;

    /**
     * Saving services to a class and connecting to header and footer
     *
     * @param $services
     */
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
     * Setting variables from the suppliers
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setVariable($key, $value)
    {
        return $this->variables[$key] = $value;
    }
}