<?php

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class) {
    $class_file = str_replace('\\', '/', $class) . '.php';
    require_once $class_file;
});

//fungsinya untuk nge load semua file php yg ada dari semua folder sampai sub foldernya.