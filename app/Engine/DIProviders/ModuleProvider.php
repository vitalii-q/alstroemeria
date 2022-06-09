<?php
namespace app\Engine\DIProviders;

abstract class ModuleProvider
{
    protected $di;

    public function __construct(\app\Engine\DI $di)
    {
        $this->di = $di;
    }

    abstract function init();
}