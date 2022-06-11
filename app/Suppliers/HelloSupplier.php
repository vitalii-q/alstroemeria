<?php

namespace app\Suppliers;

use engine\Foundation\Suppliers;

class HelloSupplier extends Suppliers
{
    public function supply()
    {
        $this->theme->setVariable('hello', 'Welcome');
    }
}