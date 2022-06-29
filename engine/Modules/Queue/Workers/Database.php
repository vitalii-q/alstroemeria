<?php

namespace engine\Modules\Queue\Workers;

use engine\Modules\Queue\Basic;
use engine\Modules\Queue\Interfaces\IJob;
use engine\Modules\Queue\Interfaces\JobChecker;

class Database extends Basic implements JobChecker, IJob
// LSP - Принцип подстановки Барбары Лисков / The Liskov Substitution Principle
{
    /**
     * Checking connected worker
     *
     * @return mixed|void
     */
    public function checkWorker()
    {
        //echo 'Queue worker is: ' . $this->workerName.'<br>';
        return true;
    }

    /**
     * Putting the job in the queue
     *
     * @return mixed|void
     */
    public function setJob() {}

    public function jobHandler() {}

    public function deleteJob() {}
}