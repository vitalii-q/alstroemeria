<?php

namespace engine\Contracts;

interface iListener
{
    public function handle($event);
}