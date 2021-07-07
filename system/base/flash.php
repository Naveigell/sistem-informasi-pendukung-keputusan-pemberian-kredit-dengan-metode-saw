<?php

function abort404(){
    echo "404 not found";
}

function flashGet($key) {
    $session = new System\Session\Session();
    $flash = $session->get($key);
    $session->forget($key);

    return $flash;
}

function flashHas($key){
    $session = new System\Session\Session();
    return $session->has($key);
}