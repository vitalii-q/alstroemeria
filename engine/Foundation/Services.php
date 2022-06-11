<?php

namespace engine\Foundation;

class Services
{
    /**
     * @var array
     */
    protected $services = [];

    /**
     * Setting modules to the DI
     *
     * @param $serviceName
     * @param $service
     * @return void
     */
    public function setService($serviceName, $service)
    {
        $this->services[$serviceName] = $service;
    }

    /**
     * Getting modules from the DI
     *
     * @param $serviceName
     * @return mixed
     */
    public function getService($serviceName)
    {
        return $this->services[$serviceName];
    }

    /**
     * Availability check module in the DI
     *
     * @param $serviceName
     * @return bool
     */
    public function issetService($serviceName)
    {
        return isset($this->services[$serviceName]);
    }
}