<?php

namespace engine\Helper;

class Finder
{
    /**
     * Getting all files from the directory
     *
     * @param $dir
     * @return array|false
     */
    public function findFiles($dir)
    {
        // ищем файлы в папке и подпапках
        $files = glob($dir."/*.*",GLOB_NOSORT); // ищем файловые пути в директории
        do {
            $dir = $dir."/*";
            $files2 = glob($dir."/*.*",GLOB_NOSORT);

            $files = array_merge($files, $files2);
        } while(sizeof($files2) > 0); // если есть файлы в папке

        return $files;
    }
}