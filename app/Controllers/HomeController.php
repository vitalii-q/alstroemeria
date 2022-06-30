<?php
namespace app\Controllers;

use engine\Factory\StaticFactory\UserFactory;
use engine\Foundation\Controller;
use app\Models\Department;
use engine\Modules\Mail;
use engine\Modules\Queue\Queue;

class HomeController extends Controller
{
    public function index()
    {
        //Queue::dispatch('test', 'redis');
        //Mail::class()->subscription('human@mail.ru');

        //$user = UserFactory::make('Alex', 'alex@mail.ru', 'IT', 'admin');



        //var_dump();

        $department = Department::get();

        $index = 'home page';

        $this->view->render('index', compact('department', 'index'));
    }
}

