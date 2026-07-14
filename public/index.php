<?php

use App\Controllers\UserController;
use App\Middlewares\AuthMiddleware;
use Src\DB;
use Src\Request;
use Src\Route;
use Src\SessionStore;

require_once __DIR__ . '/../vendor/autoload.php';

// DB::data(['name' => 'jatin', 'email' => 'jchauhan@bamko.net', 'password' => '123445'])->query("INSERT INTO users (`first_name`,`email`,`password`) VALUES(:name,:email,:password)");

// $handler = new SessionStore();
// session_set_save_handler($handler, true);
// session_start();
// echo $handler->test(__DIR__ . '/session', 'login');

// echo $handler->open(__DIR__ . '/session', 'login');
// echo $ds = $handler->read('dgjenelntqnkb0tpvcgv6ac4np');
// echo $handler->write('dgjenelntqnkb0tpvcgv6ac4np', serialize(['jatin' => 'name']));
// echo $handler->destroy('dgjenelntqnkb0tpvcgv6ac4np');

$routes = require_once __DIR__ . '/../routes/web.php';

echo $routes->run();

// dump(Request::all());

// echo password_hash("login", PASSWORD_DEFAULT);

// dump($routes);
// dump($_SERVER);
// dump($_SESSION);
