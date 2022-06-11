<?php
namespace app\Controllers;

use engine\Foundation\Controller;
use app\Models\Department;

class HomeController extends Controller
{
    public function index()
    {
        $department = Department::get();

        $index = 'home page';

        $this->view->render('index', compact('department', 'index'));
    }
}

