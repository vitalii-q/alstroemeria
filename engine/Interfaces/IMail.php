<?php

namespace engine\Interfaces;

interface IMail
{
    public function __construct($address);

    public function create();
}
