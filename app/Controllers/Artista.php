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
        $ArtistaModel           = new ArtistaModel();

        // Populating Data
        $article                = $ArtistaModel->where('alias', $alias)->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['caturi']         = 'artista';
        $data['cattitle']       = 'Artista';

        // Return Data To View
        return view('fileartista', $data);
    }
}
