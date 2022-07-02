<?php

namespace app\Models;

use engine\Database\StaticQueryBuilder;

class DepartmentUser
{
    use StaticQueryBuilder;

    /**
     * table name variable
     *
     * @var string
     */
    protected static $table = 'department_user';
}