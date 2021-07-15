<?php

function sessionGet($key) {
    $session = new System\Session\Session();
    return $session->get($key);
}

function sessionHas($key){
    $session = new System\Session\Session();
    return $session->has($key);
}