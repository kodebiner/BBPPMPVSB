<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $data;

    public function index()//: string
    {

        // parsing data to view
        $data           = $this->data;
        return view('layout', $data);
        // return view('welcome_message');
    }
}
