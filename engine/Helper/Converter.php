<?php

namespace engine\Helper;

class Converter
{
    static public function arrayNumericConvertor($array)
    {
        $newArray = [];
        foreach ($array as $key => $item) {
            $newArray[$key + 1] = $item;
        }

        return $newArray;
    }
}