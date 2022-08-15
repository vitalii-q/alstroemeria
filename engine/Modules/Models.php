<?php

namespace engine\Modules;

use engine\Database\QB;
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

        $this->setTable($className);
    }

    public function __get($property)
    {
        return $this->attributes[$property];
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function setAttribute($property, $value)
    {
        $this->attributes[$property] = $value;
    }

    public function save()
    {
        unset($this->attributes['id']);
        unset($this->attributes['created_at']);
        unset($this->attributes['updated_at']);

        foreach ($this->attributes as $key => $attribute) {
            if (!$attribute) {
                unset($this->attributes[$key]);
            }
        }

        $this::create($this->attributes);
    }

    protected function setTable($className)
    {
        $table = convertToSnakeCase($className);

        $qb = new QB();
        $db_tables = $qb->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'")->exe();

        foreach ($db_tables as $db_table) {
            if ($db_table->table_name === $table) {
                $this->table = convertToSnakeCase($className);

                break;
            }

            if ($db_table->table_name === $table.'s') {
                $this->table = convertToSnakeCase($className.'s');

                break;
            }
        }
    }
}