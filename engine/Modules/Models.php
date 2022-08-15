<?php

namespace engine\Modules;

use engine\Database\QB;
use engine\Database\StaticQueryBuilder;

abstract class Models
{
    use StaticQueryBuilder;

    /**
     * Selected table
     *
     * @var string
     */
    protected string $table;

    /**
     * Element attributes
     *
     * @var array
     */
    protected array $attributes;

    /**
     * Get selected table
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $classNamespaceExp = explode('\\', get_class($this));
        $className = end($classNamespaceExp);

        $this->setTable($className);
    }

    /**
     * Get element property
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->attributes[$property];
    }

    /**
     * Set element attributes
     *
     * @param $attributes
     * @return void
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Set element attribute
     *
     * @param $property
     * @param $value
     * @return void
     */
    public function setAttribute($property, $value)
    {
        $this->attributes[$property] = $value;
    }

    /**
     * Save new element
     *
     * @return void
     */
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

    /**
     * Search and set class variable "$this->>table"
     *
     * @param $className
     * @return void
     * @throws \Exception
     */
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