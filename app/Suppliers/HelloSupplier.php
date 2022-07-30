<?php

namespace app\Suppliers;

use engine\Foundation\Suppliers;

class HelloSupplier extends Suppliers
{
    /**
     * Passing a test variable to the theme service
     *
     * @return mixed|void
     */
    public function supply()
    {
        $this->theme->setVariable('hello', 'Welcome');
    }
}
