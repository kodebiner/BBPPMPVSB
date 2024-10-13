<?php

namespace App\Controllers;
use App\Models\PagesModel;

class Ppid extends BaseController
{
    protected $data;

    public function ppid()//: string
    {
        // Calling Models
        $PagesModel          = new PagesModel();

        // Populating Data
        $article                = $PagesModel->where('name', 'PPID')->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "PPID";
        $data['description']    = "PPID terkait BBPPMPVSB";
        $data['article']        = $article;
        $data['caturi']         = 'ppid';
        $data['cattitle']       = 'PPID';

        // Return Data To View
        return view('ppid', $data);
    }
}
