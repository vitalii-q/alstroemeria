<?php
namespace app\Controllers;

use app\Events\NewUser;
use app\Models\DepartmentUser;
use app\Models\Product;
use app\Models\User;
use engine\Database\QB;
use engine\Factory\Database\MySQLDBFactory;
use engine\Factory\Database\SQLiteDBFactory;
use engine\Factory\FactoryMethod\Save\FileSaveFactory;
use engine\Factory\FactoryMethod\Save\MySQLSaveFactory;
use engine\Factory\StaticFactory\UserFactory;
use engine\Foundation\Controller;
use app\Models\Department;
use engine\Helper\Session;
use engine\Modules\Cart\Offer;
use engine\Modules\Cart\Sale;
use engine\Modules\Mail;
use engine\Modules\Queue\Queue;

class HomeController extends Controller
{
    public function index()
    {
        //Queue::dispatch('test', 'redis');
        //MailIntercept::class()->subscription('human@mail.ru');

        //$user = UserFactory::make('Alex', 'alex@mail.ru', 'IT', 'admin');

        //$saver = new MySQLSaveFactory();
        //$saver->createSaver()->save('iPhone', '89000');

        //$saver = new MySQLSaveFactory();
        //$saver->query()->execute();

        /*FQueryCreate(new MySQLDBFactory('product', [
            'name' => 'iPhone',
            'price' => '99000'
        ]));*/

        //$department = Department::find(1);
        //$qb = new QB();
        //$department = $qb->table('department')->exe();
        //var_dump($department);

        $index = 'home page';

        $this->view->render('index', compact('index'));
        //$this->view->render('index', compact('department', 'index'));
    }
}

