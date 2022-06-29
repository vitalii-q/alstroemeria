<?php

namespace engine\Modules\Queue;

class Basic
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
     * Worker plug
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        throw new \Exception('<strong>Error: </strong>queue worker is not set<br>');
    }
}