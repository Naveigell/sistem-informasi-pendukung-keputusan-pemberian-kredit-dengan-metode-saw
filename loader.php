<?php

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class) {
    require_once $class.'.php';
});

//fungsinya untuk nge load semua file php yg ada dari semua folder sampai sub foldernya.