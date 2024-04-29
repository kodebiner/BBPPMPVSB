<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\SeminarModel;
use Tatter\Visits\Models\VisitModel;

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
        $UsersModel             = new UsersModel();
        $SeminarModel           = new SeminarModel();
        $VisitModel             = new VisitModel();

        // Populating Data
        $article                = $SeminarModel->where('alias', $alias)->first();
        $user                   = $UsersModel->find($article['userid']);
        if (empty($user)) {
            $creator = 'Tim BBPPMPV Seni & Budaya';
        } else {
            $creator = $user['username'];
        }
        $visitors       = $VisitModel->where('path', '/informasi/seminarwebinar/'.$alias)->find();
        $viewvisit      = [];
        foreach ($visitors as $visit) {
            $viewvisit[]    = $visit->views;
        }

        // URL Encode
        $url        = base_url().'informasi/seminarwebinar/'.$alias;
        $urlencode  = urlencode($url);

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['description'];
        $data['article']        = $article;
        $data['caturi']         = 'informasi/seminarwebinar';
        $data['cattitle']       = 'Seminar & Webinar';
        $data['user']           = $creator;
        $data['visitors']       = array_sum($viewvisit);
        $data['url']            = $url;
        $data['urlencode']      = $urlencode;

        // Return Data To View
        return view('article', $data);
    }
}
