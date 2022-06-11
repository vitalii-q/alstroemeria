<?php

namespace engine\Foundation;

class Services
{
    protected $services = [];

    public function setService($serviceName, $service)
    {
        $this->services[$serviceName] = $service;
    }

    public function getService($serviceName)
    {
        return $this->services[$serviceName];
    }

    public function issetService($serviceName)
    {
        return isset($this->services[$serviceName]);
    }
}