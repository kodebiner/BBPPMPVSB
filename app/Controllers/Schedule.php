<?php

namespace App\Controllers;
use App\Models\ContentModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;

class Schedule extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ContentModel           = new ContentModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $ContentModel->where('catid', '17')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $ContentModel->where('catid', '17')->orderBy('publish_up', 'DESC')->paginate(12, 'news');
        }


        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Jadwal Kegiatan";
        $data['description']    = "Jadwal Kegiatan terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'jadwal-kegiatan';
        $data['cattitle']       = 'Jadwal Kegiatan';
        $data['count']          = count($newses);
        $data['pager']          = $ContentModel->pager;

        // Return Data To View
        return view('registration', $data);
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
        $data['caturi']         = 'jadwal-kegiatan';
        $data['cattitle']       = 'Jadwal Kegiatan';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
