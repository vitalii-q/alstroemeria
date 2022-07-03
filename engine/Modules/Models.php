<?php

namespace engine\Modules;

use engine\Database\StaticQueryBuilder;

abstract class Models
{
    use StaticQueryBuilder;

    protected string $table;

    protected array $attributes;

    public function __construct()
    {
        $classNamespaceExp = explode('\\', get_class($this));
        $className = end($classNamespaceExp);
        $this->table = convertToSnakeCase($className);
    }

    public function __get($property)
    {
        return $this->attributes[$property];
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
}