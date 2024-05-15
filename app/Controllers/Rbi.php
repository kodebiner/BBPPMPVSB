<?php

namespace App\Controllers;

use App\Models\RbiModel;

class Rbi extends BaseController
{
    protected $data;

    public function index($alias)
    {
        // Calling Models
        $RbiModel               = new RbiModel();

        // Populating Data
        $article                = $RbiModel->where('alias', $alias)->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['caturi']         = 'rbi';
        $data['cattitle']       = 'RBI';

        // Return Data To View
        return view('rbi', $data);
    }
}
