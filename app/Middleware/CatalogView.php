<?php

namespace app\Middleware;

use engine\Helper\Session;

class CatalogView
{
    public function handle()
    {
        if(!Session::isset('view.catalog')) {  // устанавливаем стандартный вид каталога
            Session::set('view.catalog', 'grid');
        }
    }
}

