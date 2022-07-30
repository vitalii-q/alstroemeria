<?php

namespace engine\Contracts\Factory\Database;

interface IDatabaseFactory // ПП Abstract Factory / Абстрактная фабрика
{
    public function connect() : IDatabaseConnect;

    public function query($query);
}