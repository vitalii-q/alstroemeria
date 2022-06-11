<?php

namespace app\Models;

use engine\Database\StaticQueryHandler;

class Department
{
    use StaticQueryHandler;

    /**
     * Departments table name variable
     *
     * @var string
     */
    protected static $table = 'department';
}