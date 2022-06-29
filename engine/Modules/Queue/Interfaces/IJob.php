<?php

namespace engine\Modules\Queue\Interfaces;

interface IJob
{
    public function jobHandler();

    public function deleteJob();
}