<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\ContentModel;
use App\Models\UserModel;
use App\Models\ArtistaModel;

class Artista extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ArtistaModel   = new ArtistaModel();

        // Search Engine
        // Populating Data
        $artistas   = $ArtistaModel->orderBy('id', 'DESC')->find();

        $page       = (int)($this->request->getGet('artista') ?? 1);
        $perPage    = 24;
        $total      = count($artistas);

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'uikit_full');

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Majalah Artista";
        $data['description']    = "Majalah Artista terkait BBPPMPVSB";
        $data['artistas']       = $artistas;
        $data['caturi']         = 'artista';
        $data['cattitle']       = 'Majalah Artista';
        $data['count']          = count($artistas);
        $data['pager']          = $pager_links;

        // Return Data To View
        return view('artista', $data);
    }

    public function article($alias)
    {
        // Calling Models
        $CategoriesModel        = new CategoriesModel();
        $ContentModel           = new ContentModel();
        $UserModel              = new UserModel();

        // Populating Data
        $article                = $ContentModel->where('alias', $alias)->first();
        $category               = $CategoriesModel->where('id', $article['catid'])->first();
        $user                   = $UserModel->where('id', $article['created_by'])->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['category']       = $category;
        $data['caturi']         = 'berita';
        $data['cattitle']       = 'Berita';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
