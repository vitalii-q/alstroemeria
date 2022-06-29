<?php

namespace engine\Modules\Queue\Workers;

use engine\Modules\Queue\Basic;

class Database extends Basic // LSP - Принцип подстановки Барбары Лисков / The Liskov Substitution Principle
{
    /**
     * Putting the job in the queue
     *
     * @return mixed|void
     */
    public function setJob()
    {
        echo 'Queue worker is: ' . $this->workerName.'<br>';
    }
}