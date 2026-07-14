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
        
        $result = DB::singleRecord("SELECT * FROM users WHERE email = :email", [
            'email' => $data->email
        ]);

        if (!empty($result) && password_verify($data->password, $result['password'])) {
            ClassicSession::set('user_id', $result['user_id']);
            redirect('profile');
        } else {
            redirect('login');
        }
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
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
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
