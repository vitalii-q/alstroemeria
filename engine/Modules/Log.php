<?php

namespace engine\Modules;

class Log
{
    /**
     * TODO: удаление старых логов на крон
     * TODO: file_put_contents запись дублируется
    */

    /**
     * folder with logs
     *
     * @var string
     */
    protected $directory = ROOT_DIR . '/storage/logs/';

    /**
     * number of days to storage logs
     *
     * @var int
     */
    protected $days = 10;

    public function logging($message) {
        file_put_contents($this->directory.date('m-d-y').'.log',
            date("G:i:s T Y").' '.$message.PHP_EOL, FILE_APPEND); // FILE_APPEND дописать в конец файла

        /*$fh = fopen($this->directory.date('m-d-y').'.log', 'a');
        fwrite($fh, $message.PHP_EOL);
        fclose($fh);

        var_dump(file_get_contents($this->directory.date('m-d-y').'.log'));
        die();*/

        $this->deleteOldLogs();
    }

    public function deleteOldLogs() {
        $dir = array_diff(scandir($this->directory), array('..', '.'));

        foreach ($dir as $file) {
            if(filemtime($this->directory.$file) <
                mktime(0, 0, 0, date('m'), date('d') - $this->days, date('Y'))) {
                unlink($this->directory.$file);
            }
        }
    }
}

