<?php

namespace engine\Factory\FactoryMethod\Save;


use engine\Contracts\Factory\Save\ISaveFactory;
use engine\Factory\FactoryMethod\Save\Type\FileSave;

class FileSaveFactory implements ISaveFactory // ПП Factory method / Фабричный метод
{
    private $filePath;

    public function __construct()
    {
        $this->filePath = 'storage/saved';
    }

    public function createSaver(): FileSave
    {
        return new FileSave($this->filePath);
    }
}