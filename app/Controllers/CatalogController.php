<?php
namespace app\Controllers;

use engine\Foundation\Controller;

class CatalogController extends Controller
{
    public function index()
    {
        $this->view->render('catalog');
    }
}