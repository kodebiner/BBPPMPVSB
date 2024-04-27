<?php

namespace App\Controllers;
use App\Models\UsersModel;
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
        $UsersModel             = new UsersModel();
        $BeritaModel            = new BeritaModel();

        // Populating Data
        $article                = $BeritaModel->where('alias', $alias)->first();
        $user                   = $UsersModel->find($article['userid']);
        if (empty($user)) {
            $creator = 'Tim BBPPMPV Seni & Budaya';
        } else {
            $creator = $user['username'];
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['description'];
        $data['article']        = $article;
        $data['caturi']         = 'berita';
        $data['cattitle']       = 'Berita';
        $data['user']           = $creator;

        // Return Data To View
        return view('article', $data);
    }
}
