<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\ContentModel;
use App\Models\UserModel;

class Seminar extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager                  = \Config\Services::pager();

        // Calling Models
        $ContentModel           = new ContentModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $ContentModel->where('catid', '20')->orWhere('catid', '13')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $ContentModel->where('catid', '20')->orWhere('catid', '13')->orderBy('publish_up', 'DESC')->paginate(10, 'news');
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Seminar / Webinar";
        $data['description']    = "Seminar dan Webinar terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'informasi/seminarwebinar';
        $data['cattitle']       = 'Seminar / Webinar';
        $data['count']          = count($newses);
        $data['pager']          = $ContentModel->pager;

        // Return Data To View
        return view('news', $data);
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
        $data['caturi']         = 'informasi/seminarwebinar';
        $data['cattitle']       = 'Seminar / Webinar';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
