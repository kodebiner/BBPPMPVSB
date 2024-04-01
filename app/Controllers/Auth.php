<?php

namespace App\Controllers;


class Auth extends BaseController
{

    public function loginView()
    {
        return view('Views/login');
    }
    public function registerView()
    {
        return view('Views/register');
    }

}
