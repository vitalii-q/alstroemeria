<?php

function makeObj($called_class) {
    return new $called_class;
}

function setObjAttributes($class, $attributes) {
    $keys = []; $values = [];
    foreach ($attributes as $key => $value) {
        array_push($keys, $key);
        array_push($values, $value);
    }

    $class->setAttributes(array_combine($keys, $values));
}

function setModelsAttributes($model, $elements) {
    $models = [];
    foreach ($elements as $attributes) {
        $newClass = makeObj($model);
        setObjAttributes($newClass, $attributes);
        array_push($models, $newClass);
    }

    return $models;
}