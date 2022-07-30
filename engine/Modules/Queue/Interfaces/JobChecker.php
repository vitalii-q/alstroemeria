<?php

namespace engine\Modules\Queue\Interfaces;

interface JobChecker
{
    public function checkWorker();
}