<?php
namespace app\Engine\Helper;

class Get
{
    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public static function config($key) {
        $path = ROOT_DIR . '/config/' . $key . '.php';

        if(file_exists($path)) {
            $items = require $path; // require_once если убрать статические методы

            if(!empty($items)) {
                return $items;
            } else {
                throw new \Exception(sprintf('Config file <strong>%s</strong> is not a valid array.', $path));
            }
        } else {
            throw new \Exception(sprintf('Cannot load config from file, file <strong>%s</strong> does not exist.', $path));
        }
    }

    public function file($key) {

    }
}