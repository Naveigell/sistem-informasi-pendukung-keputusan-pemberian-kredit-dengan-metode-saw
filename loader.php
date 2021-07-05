<?php
function autoload($dir){
    foreach (scandir(getcwd().$dir) as $filename) {
        $file = getcwd().$dir.$filename;

        if (is_file($file)) {
            /** @noinspection PhpIncludeInspection */
            require_once($file);
        } elseif (is_dir($file) && $filename !== "." && $filename !== ".." && $filename !== "views") {
            autoload($dir.$filename.'/');
        }
    }
}

autoload('/system/');
autoload('/app/');