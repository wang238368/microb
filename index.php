<?php
if(!file_exists('./app/Data/install.lock')){
    require_once './install.php';
    exit();
}
$loader = require_once "./autoload.php";

require_once './AppKernel.php';

$app = new AppKernel();
$app->run();