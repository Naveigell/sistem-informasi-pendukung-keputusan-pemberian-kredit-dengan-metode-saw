<?php
session_start();

define("START_TIME", microtime(true));

require_once 'system/helpers.php';
require_once 'config.php';
require_once 'loader.php';
require_once 'routes.php';

