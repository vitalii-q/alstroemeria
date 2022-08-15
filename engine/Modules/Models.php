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

        /**
         * Закончить с преверку таблицы на существование user / users
         */
        /*$table = convertToSnakeCase($className);

        $qb = new QB();
        $db_tables = $qb->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'")->exe();
        //var_dump($db_tables);

        $table_exists = false;
        foreach ($db_tables as $table) {
            //var_dump($table);
        }*/

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
}