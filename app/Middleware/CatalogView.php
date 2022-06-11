<?php

namespace app\Middleware;

use engine\Helper\Session;

class CatalogView
{
    /**
     * Handling middleware catalog view
     *
     * @return void
     */
    public function handle()
    {
        if(!Session::isset('view.catalog')) {  // устанавливаем стандартный вид каталога
            Session::set('view.catalog', 'grid');
        }
    }
}

