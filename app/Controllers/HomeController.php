<?php
namespace app\Controllers;

use engine\Factory\Database\MySQLDBFactory;
use engine\Factory\Database\SQLiteDBFactory;
use engine\Factory\FactoryMethod\Save\FileSaveFactory;
use engine\Factory\FactoryMethod\Save\MySQLSaveFactory;
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

        //$saver = new MySQLSaveFactory();
        //$saver->createSaver()->save('iPhone', '89000');

        //$saver = new MySQLSaveFactory();
        //$saver->query()->execute();

        /*FQueryCreate(new MySQLDBFactory('product', [
            'name' => 'iPhone',
            'price' => '99000'
        ]));*/

        //var_dump();

        $department = Department::get();

        $index = 'home page';

        $this->view->render('index', compact('department', 'index'));
    }
}

