<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function login()
    {
        return view('user/login');
    }
    
    public function register()
    {
        return view('user/register');
    }
    
    public function loginProcess()
    {
        return view('user/register');
    }
    
    public function registerProcess()
    {
        
    }
}
