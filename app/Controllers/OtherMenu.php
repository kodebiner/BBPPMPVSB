<?php

namespace App\Controllers;

use App\Models\OtherMenuModel;

class OtherMenu extends BaseController
{
    protected $data;

    public function index($alias)
    {
        // Calling Models
        $OtherMenuModel         = new OtherMenuModel();

        // Populating Data
        $article                = $OtherMenuModel->where('alias', $alias)->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['caturi']         = 'othermenu';
        $data['cattitle']       = 'Other Menu';

        // Return Data To View
        return view('othermenu', $data);
    }
}
