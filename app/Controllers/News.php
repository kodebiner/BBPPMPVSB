<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\BeritaModel;
use Tatter\Visits\Models\VisitModel;

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
            $newses     = $BeritaModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->find();
        } else {
            $newses     = $BeritaModel->orderBy('updated_at', 'DESC')->where('status', 1)->paginate(10, 'news');
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
        $VisitModel             = new VisitModel();

        // Populating Data
        $article                = $BeritaModel->where('alias', $alias)->where('status', 1)->first();
        $nextarticles           = $BeritaModel->orderBy('updated_at', 'ASC')->where('updated_at >', $article['updated_at'])->limit(1)->get()->getResultArray();
        $prevarticles           = $BeritaModel->orderBy('updated_at', 'DESC')->where('updated_at <', $article['updated_at'])->limit(1)->get()->getResultArray();
        $user                   = $UsersModel->find($article['userid']);
        
        if (!empty($nextarticles)) {
            foreach ($nextarticles as $nextarticle) {
                $nexturl        = $nextarticle['alias'];
            }
        } else {
            $nexturl            = '';
        }

        if (!empty($prevarticles)) {
            foreach ($prevarticles as $prevarticle) {
                $prevurl        = $prevarticle['alias'];
            }
        } else {
            $prevurl            = '';
        }

        if (empty($user)) {
            $creator = 'Tim BBPPMPV Seni & Budaya';
        } else {
            $creator = $user['username'];
        }
        $visitors       = $VisitModel->where('path', '/berita/'.$alias)->find();
        $viewvisit      = [];
        foreach ($visitors as $visit) {
            $viewvisit[]    = $visit->views;
        }

        // URL Encode
        $url        = base_url().'berita/'.$alias;
        $urlencode  = urlencode($url);

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['description'];
        $data['article']        = $article;
        $data['nextarticles']   = '/berita/'.$nexturl;
        $data['prevarticles']   = '/berita/'.$prevurl;
        $data['caturi']         = 'berita';
        $data['cattitle']       = 'Berita';
        $data['user']           = $creator;
        $data['visitors']       = array_sum($viewvisit);
        $data['url']            = $url;
        $data['urlencode']      = $urlencode;

        // Return Data To View
        return view('article', $data);
    }
}
