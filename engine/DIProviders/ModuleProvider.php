<?php
namespace engine\DIProviders;

abstract class ModuleProvider
{
    protected $di;

    public function __construct(\engine\DI $di)
    {
        $this->di = $di;
    }

    abstract function init();
}