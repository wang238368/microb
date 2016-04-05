<?php

/**
 * 系统调试设置
 * 项目正式部署后请设置为false
 */
define ( 'BIND_MODULE','Install');


$loader = require_once "./autoload.php";

require_once './AppKernel.php';

$app = new AppKernel();
$app->run();