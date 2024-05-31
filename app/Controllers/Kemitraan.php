<?php

namespace App\Controllers;

use App\Models\KemitraanModel;

class Kemitraan extends BaseController
{
    protected $data;

    public function index($alias)
    {
        // Calling Models
        $KemitraanModel         = new KemitraanModel();

        // Populating Data
        $article                = $KemitraanModel->where('alias', $alias)->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['caturi']         = 'kemitraan';
        $data['cattitle']       = 'Kemitraan';

        // Return Data To View
        return view('kemitraan', $data);
    }
}
