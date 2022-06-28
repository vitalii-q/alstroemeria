<?php
namespace app\Controllers;

use engine\Foundation\Controller;
use app\Models\Department;
use engine\Modules\Mail;

class HomeController extends Controller
{
    public function index()
    {
        //Mail::class()->subscription('human@mail.ru');

        $department = Department::get();

        $index = 'home page';

        $this->view->render('index', compact('department', 'index'));
    }
}

