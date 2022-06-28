<?php

namespace engine\Modules;

class Log // solid SRP - Принцип единственной обязанности / Single Responsibility Principle
{
    /**
     * TODO: удаление старых логов на крон
    */

    private static $class;

    /**
     * folder with logs
     *
     * @var string
     */
    private $directory = ROOT_DIR . '/storage/logs/';

    /**
     * number of days to storage logs
     *
     * @var int
     */
    protected $days = 10;

    /**
     * Restricting class calls
     */
    private function __construct() {}

    /**
     * Restricting cloning class
     */
    private function __clone() {}

    /**
     * Calling self class
     *
     * @return Log
     */
    public static function class()
    {
        if(is_null(self::$class)) {
            self::$class = new self();
        }

        return self::$class;
    }

    /**
     * Logging errors and notifications
     *
     * @param $message
     * @return void
     */
    public function logging($message)
    {
        file_put_contents($this->directory.date('m-d-y').'.log',
            date("G:i:s T Y").' '.$message.PHP_EOL, FILE_APPEND); // FILE_APPEND дописать в конец файла

        $this->deleteOldLogs();
    }

    /**
     * Deleting old logs
     *
     * @return void
     */
    public function deleteOldLogs()
    {
        $dir = array_diff(scandir($this->directory), array('..', '.'));

        foreach ($dir as $file) {
            if(filemtime($this->directory.$file) <
                mktime(0, 0, 0, date('m'), date('d') - $this->days, date('Y'))) {
                unlink($this->directory.$file);
            }
        }
    }
}

