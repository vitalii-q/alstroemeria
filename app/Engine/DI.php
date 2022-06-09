<?php
namespace App\Engine;

class DI
{
    /**
     * @var
     */
    protected $di = [];

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public function set($key, $value)
    {
        $this->di[$key] = $value;
    }

    public function get ($key) {
        return $this->has($key);
    }

    public function has($key) {
        return isset($this->di[$key]) ? $this->di[$key] : null;
    }
}