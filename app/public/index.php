<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Helpers/DD.php';
require_once __DIR__ . '/../src/Routes/Api.php';
$bindings = require __DIR__ . '/../src/Conf/Bindings.php';
// $entityManager = require_once __DIR__ . '/../src/Conf/Doctrine.php';

use App\Routes\Route;
use App\Conf\Container;

$container = new Container();

$bindings($container);

Route::dispatch($container);