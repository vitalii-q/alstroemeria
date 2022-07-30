<?php

namespace engine\Modules\Queue;

use engine\Helper\Get\Config;

class QueueMediator
{
    /**
     * Queue worker file path
     *
     * @var string
     */
    protected $workerPath = 'engine/Modules/Queue/Workers';

    /**
     * Queue worker class path
     * @var string
     */
    protected $classPath = '\engine\Modules\Queue\Workers\\';

    /**
     * Worker object
     *
     * @var Basic|mixed
     */
    public $worker;

    /**
     * Setting active worker
     */
    public function __construct()
    {
        if(!Config::class()->get('queue')['connection']) { // если обработчик не указан
            $this->worker = new Basic();
        }

        foreach (array_diff(scandir($this->workerPath), array('.', '..')) as $worker) { // поиск обработчика
            $fileName = explode('.', $worker);

            if(ucfirst(Config::class()->get('queue')['connection']) == $fileName[0]) { // ucfirst - первую букву в верхний регистр
                $workerClass = $this->classPath.$fileName[0];
                $this->worker = new $workerClass(strtolower($fileName[0]));
            }
        }

        if(is_null($this->worker)) {
            throw new \Exception('Queue worker "' . Config::class()->get('queue')['connection'] .'" is not exist');
        }
    }

    /**
     * Getting worker
     *
     * @return Basic|mixed
     */
    public function getWorker()
    {
        return $this->worker;
    }
}