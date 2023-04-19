<?php

namespace App\Controllers;

use App\Models\CommonModel;
use Src\DB;
use Src\Request;
use Src\ClassicSession;

class UserController
{
    public function profile()
    {        
        return masterView('profile');
    }

    public function login()
    {
        return guestView('login');
    }

    public function validateLogin()
    {
        $data = (object) Request::only(['email', 'password']);
        $result = DB::singleRecord("SELECT * FROM users WHERE email = '$data->email' AND PASSWORD = '$data->password' ");

        if (!empty($result)) ClassicSession::set('user_id', $result['user_id']);
        empty($result) ? redirect('login') : redirect('profile');
    }

    public function register()
    {
        return guestView('register');
    }

    public function forgotPassword()
    {
        return guestView('forgot_password');
    }

    public function userRegister()
    {
        $data = Request::only(['first_name', 'last_name', 'email', 'password']);
        $userRegister = DB::data($data)->query("Insert into users (`first_name`,`last_name`,`email`,`password`) VALUES(:first_name,:last_name,:email,:password) ");
        // $values = implode(',', array_map(fn ($mp) => "'$mp'", array_values($_POST)));        
        $userRegister ? redirect('profile') : redirect('register');
    }

    public function logout()
    {
        ClassicSession::clear();
        redirect('login');
    }

    public function dashboard()
    {
        return masterView('dashboard');
    }

    public function show($id)
    {
        echo $id;
    }
}
