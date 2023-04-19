<?php

namespace App\Middlewares;

use Src\ClassicSession;
use Src\Middleware;

class AuthMiddleware extends Middleware
{
    public function execute(): bool
    {
        if (!empty(ClassicSession::get('user_id')))  return true;

        redirect('login');
        dump('403 | Forbidden');
        return false;
    }
}
