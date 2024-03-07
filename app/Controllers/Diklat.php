<?php

namespace App\Controllers;
use App\Models\ContentModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;

class Diklat extends BaseController
{
    protected $data;

    public function indexarticle()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ContentModel           = new ContentModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->paginate(10, 'news');
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Diklat";
        $data['description']    = "Diklat terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'diklat/artikel';
        $data['cattitle']       = 'Artikel Diklat';
        $data['count']          = count($newses);
        $data['pager']          = $ContentModel->pager;

        // Return Data To View
        return view('news', $data);
    }

    public function indexregistration()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ContentModel           = new ContentModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $ContentModel->where('catid', '19')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $ContentModel->where('catid', '19')->orderBy('publish_up', 'DESC')->paginate(12, 'news');
        }


        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Pendaftaran Diklat";
        $data['description']    = "Pendaftaran Diklat terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'diklat/pendaftaran';
        $data['cattitle']       = 'Pendafataran Diklat';
        $data['count']          = count($newses);
        $data['pager']          = $ContentModel->pager;

        // Return Data To View
        return view('registration', $data);
    }

    public function diklatarticle($alias)
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
        $data['caturi']         = 'diklat/artikel';
        $data['cattitle']       = 'Artikel Diklat';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }

    public function diklatregistration($alias)
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
        $data['caturi']         = 'diklat/pendaftaran';
        $data['cattitle']       = 'Pendafataran Diklat';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
