<?php
namespace engine\DIProviders;

abstract class ModuleProvider
{
    /**
     * @var \engine\DI
     */
    protected $di;

    /**
     * @param \engine\DI $di
     */
    public function __construct(\engine\DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();
}