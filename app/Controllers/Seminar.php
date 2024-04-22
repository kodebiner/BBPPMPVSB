<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\SeminarModel;

class Seminar extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager                  = \Config\Services::pager();

        // Calling Models
        $SeminarModel           = new SeminarModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $SeminarModel->orderBy('updated_at', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $SeminarModel->orderBy('updated_at', 'DESC')->paginate(10, 'news');
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Seminar & Webinar";
        $data['description']    = "Seminar dan Webinar terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'informasi/seminarwebinar';
        $data['cattitle']       = 'Seminar & Webinar';
        $data['count']          = count($newses);
        $data['pager']          = $SeminarModel->pager;

        // Return Data To View
        return view('news', $data);
    }

    public function article($alias)
    {
        // Calling Models
        $UserModel              = new UserModel();
        $SeminarModel           = new SeminarModel();

        // Populating Data
        $article                = $SeminarModel->where('alias', $alias)->first();
        $user                   = $UserModel->where('id', $article['userid'])->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['alias'];
        $data['article']        = $article;
        $data['caturi']         = 'informasi/seminarwebinar';
        $data['cattitle']       = 'Seminar & Webinar';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
