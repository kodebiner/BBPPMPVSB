<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BeritaModel;

class News extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $BeritaModel    = new BeritaModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $BeritaModel->orderBy('updated_at', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $BeritaModel->orderBy('updated_at', 'DESC')->paginate(10, 'news');
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Berita";
        $data['description']    = "Berita terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['count']          = count($newses);
        $data['pager']          = $BeritaModel->pager;
        $data['caturi']         = 'berita';
        $data['cattitle']       = 'Berita';

        // Return Data To View
        return view('news', $data);
    }

    public function article($alias)
    {
        // Calling Models
        $UserModel              = new UserModel();
        $BeritaModel            = new BeritaModel();

        // Populating Data
        $article                = $BeritaModel->where('alias', $alias)->first();
        $user                   = $UserModel->where('id', $article['userid'])->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['caturi']         = 'berita';
        $data['cattitle']       = 'Berita';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
