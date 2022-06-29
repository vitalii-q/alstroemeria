<?php

namespace engine\Modules\Queue;

use engine\Modules\Queue\Interfaces\JobChecker;

class Basic implements JobChecker
// ISP - Принцип разделения интерфейса / The Interface Segregation Principle
{
    /**
     * @var mixed|null
     */
    protected $workerName;

    /**
     * @param $workerName
     */
    public function __construct($workerName = null)
    {
        $this->workerName = $workerName;
    }

    /**
     * Checking connected worker
     *
     * @return mixed
     * @throws \Exception
     */
    public function checkWorker()
    {
        throw new \Exception('<strong>Error: </strong>queue worker is not set<br>');
    }
}