<?php
namespace App;

use App\Services\Router;


require_once("./autoload.php");
require_once("./config.php");

$router = new Router();
$router->run();