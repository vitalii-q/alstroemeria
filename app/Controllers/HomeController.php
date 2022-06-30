<?php
namespace app\Controllers;

use engine\Foundation\Controller;
use app\Models\Department;
use engine\Modules\Mail;
use engine\Modules\Queue\Queue;

class HomeController extends Controller
{
    public function index()
    {
        // test
        //Queue::dispatch('test', 'redis');

        //Mail::class()->subscription('human@mail.ru');

        //var_dump();

        $department = Department::get();

        $index = 'home page';

        $this->view->render('index', compact('department', 'index'));
    }
}

