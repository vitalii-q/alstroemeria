<?php

function convertToSnakeCase($str) {
    $strWithCamelLetters = '';
    foreach (str_split($str) as $letter) {
        if($letter === strtolower($letter)) {
            $strWithCamelLetters .= $letter;
        } else {
            $strWithCamelLetters .= '_'.strtolower($letter);
        }
    }
    $strLowLetters = str_split($strWithCamelLetters);
    if($strLowLetters[0] === '_') {
        unset($strLowLetters[0]);
    }
    $string = '';
    foreach ($strLowLetters as $letter) {
        $string .= $letter;
    }

    return $string;
}