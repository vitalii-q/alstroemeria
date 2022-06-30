<?php

namespace engine\Contracts;

interface IMail
{
    public function __construct($address);

    public function create();
}
