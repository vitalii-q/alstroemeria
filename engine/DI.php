<?php
namespace engine;

class DI
{
    /**
     * @var
     */
    protected $di = [];

    /**
     * Setting module to the DI
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function set($key, $value)
    {
        $this->di[$key] = $value;
    }

    /**
     * Getting DI module
     *
     * @param $key
     * @return mixed|null
     */
    public function get ($key) {
        return $this->has($key);
    }

    /**
     * Availability check module in the DI
     *
     * @param $key
     * @return mixed|null
     */
    public function has($key) {
        return isset($this->di[$key]) ? $this->di[$key] : null;
    }
}