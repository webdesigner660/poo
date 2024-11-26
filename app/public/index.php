<?php

use App\App;

const DS = DIRECTORY_SEPARATOR;
define('ROOT_PATH', dirname(__FILE__, 2) . DS);
define('APP_PATH', ROOT_PATH . 'src' . DS);

require_once "../vendor/autoload.php";

App::getApp()->start();
