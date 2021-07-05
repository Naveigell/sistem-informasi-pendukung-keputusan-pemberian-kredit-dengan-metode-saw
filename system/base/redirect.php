<?php

function redirect($path = ''){
    header("Location: ".BASE_PATH.$path);
}