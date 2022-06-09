<?php

namespace app\Suppliers;

use app\Engine\Foundation\Suppliers;

class HelloSupplier extends Suppliers
{
    public function supply()
    {
        $this->theme->setVariable('hello', 'Welcome');
    }
}