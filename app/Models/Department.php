<?php

namespace app\Models;

use engine\Database\StaticQueryBuilder;

class Department
{
    use StaticQueryBuilder;

    /**
     * Departments table name variable
     *
     * @var string
     */
    protected static $table = 'department';
}