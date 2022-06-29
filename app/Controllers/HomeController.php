<?php
namespace app\Controllers;

use app\Models\Department;
use engine\Foundation\Controller;
use engine\Modules\Queue\Queue;

class HomeController extends Controller
{
    public function index()
    {
        //Queue::dispatch('new jobClass()');

        //Mail::class()->subscription('human@mail.ru');

        $department = Department::get();

        $index = 'home page';

        $this->view->render('index', compact('department', 'index'));
    }
}

