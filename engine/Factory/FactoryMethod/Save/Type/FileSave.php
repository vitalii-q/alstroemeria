<?php

namespace engine\Factory\FactoryMethod\Save\Type;

use engine\Contracts\Factory\Save\ISave;

class FileSave implements ISave // ПП Factory method / Фабричный метод
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function save($name, $price)
    {
        file_put_contents($this->filePath.'/products.txt', 'Название: ' . $name . PHP_EOL . 'Цена:' . $price); // PHP_EOL перенос строки
        chmod($this->filePath.'/products.txt', 0777); // установка прав
    }
}