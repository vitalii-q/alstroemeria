<?php

namespace engine\Contracts\Factory;

interface IUser
{
    public function getName();

    public function getEmail();

    public function getRole();
}