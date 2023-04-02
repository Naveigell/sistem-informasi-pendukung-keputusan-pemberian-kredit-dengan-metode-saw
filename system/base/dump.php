<?php

function dump(...$args){
    echo "<pre>";
    var_dump(...$args);
    echo "</pre>";
}

if (!function_exists('dd')) {
    function dd() {
        dump(func_get_args());
        exit();
    }
}
