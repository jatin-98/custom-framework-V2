<?php

use App\Controllers\UserController;
use App\Middlewares\AuthMiddleware;
use Src\Route;

$routes = new Route();

$routes->post('register', [UserController::class, 'register']);
$routes->get('login', [UserController::class, 'login']);
$routes->post('login_validate', [UserController::class, 'validateLogin']);
$routes->get('register', [UserController::class, 'register']);
$routes->post('user_register', [UserController::class, 'userRegister']);
$routes->get('profile', [UserController::class, 'profile'])->middleware(AuthMiddleware::class);
$routes->get('forgot_password', [UserController::class, 'forgotPassword']);
$routes->get('logout', [UserController::class, 'logout']);
$routes->get('dashboard', [UserController::class, 'dashboard']);

$routes->get('', function () {
    redirect('login');
});

$routes->get('show/{id}', [UserController::class, 'show']);

return $routes;
