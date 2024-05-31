<?php

namespace App\Controllers;
use App\Models\PagesModel;

class Profile extends BaseController
{
    protected $data;

    public function profile()//: string
    {
        // Calling Models
        $PagesModel          = new PagesModel();

        // Populating Data
        $article                = $PagesModel->where('name', 'Profile')->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Profil";
        $data['description']    = "Profil terkait BBPPMPVSB";
        $data['article']        = $article;
        $data['caturi']         = 'profile';
        $data['cattitle']       = 'Profil';

        // Return Data To View
        return view('profile', $data);
    }
}
