<?php

namespace App\Controllers;
use App\Models\ContentModel;
use App\Models\CategoriesModel;
use App\Models\UsersModel;
use App\Models\DiklatModel;
use App\Models\FotoDiklatModel;
use Tatter\Visits\Models\VisitModel;

class Diklat extends BaseController
{
    protected $data;

    // public function indexarticle()//: string
    // {
    //     // Calling Services
    //     $pager      = \Config\Services::pager();

    //     // Calling Models
    //     $ContentModel           = new ContentModel();

    //     // Search Engine
    //     // Populating Data
    //     if (isset($input['search']) && !empty($input['search'])) {
    //         $newses     = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
    //     } else {
    //         $newses     = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->paginate(10, 'news');
    //     }

    //     // Parsing Data To View
    //     $data                   = $this->data;
    //     $data['title']          = "Diklat";
    //     $data['description']    = "Diklat terkait BBPPMPVSB";
    //     $data['newses']         = $newses;
    //     $data['caturi']         = 'diklat/artikel';
    //     $data['cattitle']       = 'Artikel Diklat';
    //     $data['count']          = count($newses);
    //     $data['pager']          = $ContentModel->pager;

    //     // Return Data To View
    //     return view('news', $data);
    // }

    public function indexregistration()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $DiklatModel           = new DiklatModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $DiklatModel->orderBy('updated_at', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $DiklatModel->orderBy('updated_at', 'DESC')->paginate(12, 'news');
        }


        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Informasi Diklat";
        $data['description']    = "Informasi Diklat terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'informasi/diklat';
        $data['cattitle']       = 'Informasi Diklat';
        $data['count']          = count($newses);
        $data['pager']          = $DiklatModel->pager;

        // Return Data To View
        return view('registration', $data);
    }

    // public function diklatarticle($alias)
    // {
    //     // Calling Models
    //     $CategoriesModel        = new CategoriesModel();
    //     $ContentModel           = new ContentModel();
    //     $UsersModel              = new UsersModel();

    //     // Populating Data
    //     $article                = $ContentModel->where('alias', $alias)->first();
    //     $category               = $CategoriesModel->where('id', $article['catid'])->first();
    //     $user                   = $UsersModel->where('id', $article['created_by'])->first();

    //     // Parsing Data To View
    //     $data                   = $this->data;
    //     $data['title']          = $article['title'];
    //     $data['description']    = $article['alias'];
    //     $data['article']        = $article;
    //     $data['category']       = $category;
    //     $data['caturi']         = 'diklat/artikel';
    //     $data['cattitle']       = 'Artikel Diklat';
    //     $data['user']           = $user;

    //     // Return Data To View
    //     return view('article', $data);
    // }

    public function diklatregistration($id)
    {
        // Calling Models
        $DiklatModel            = new DiklatModel();
        $FotoDiklatModel        = new FotoDiklatModel();
        $VisitModel             = new VisitModel();

        // Populating Data
        $article        = $DiklatModel->find($id);
        $photos         = $FotoDiklatModel->where('diklatid', $id)->find();
        $visitors       = $VisitModel->where('path', '/informasi/diklat/'.$id)->find();
        $viewvisit      = [];
        foreach ($visitors as $visit) {
            $viewvisit[]    = $visit->views;
        }

        // URL Encode
        $url        = base_url().'informasi/diklat/'.$id;
        $urlencode  = urlencode($url);

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['title'];
        $data['article']        = $article;
        $data['photos']         = $photos;
        $data['caturi']         = 'informasi/diklat';
        $data['cattitle']       = 'Informasi Diklat';
        $data['visitors']       = array_sum($viewvisit);
        $data['url']            = $url;
        $data['urlencode']      = $urlencode;

        // Return Data To View
        return view('diklat', $data);
    }
}
