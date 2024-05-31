<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\ScheduleModel;
use Tatter\Visits\Models\VisitModel;

class Schedule extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ScheduleModel           = new ScheduleModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $ScheduleModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->find();
        } else {
            $newses     = $ScheduleModel->orderBy('updated_at', 'DESC')->where('status', 1)->paginate(12, 'news');
        }


        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Jadwal Kegiatan";
        $data['description']    = "Jadwal Kegiatan terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['caturi']         = 'jadwal-kegiatan';
        $data['cattitle']       = 'Jadwal Kegiatan';
        $data['count']          = count($newses);
        $data['pager']          = $ScheduleModel->pager;

        // Return Data To View
        return view('registration', $data);
    }

    public function article($alias)
    {
        // Calling Models
        $UsersModel             = new UsersModel();
        $ScheduleModel          = new ScheduleModel();
        $VisitModel             = new VisitModel();

        // Populating Data
        $article                = $ScheduleModel->where('status', 1)->find($alias);
        $nextarticles           = $ScheduleModel->orderBy('updated_at', 'ASC')->where('updated_at >', $article['updated_at'])->limit(1)->get()->getResultArray();
        $prevarticles           = $ScheduleModel->orderBy('updated_at', 'DESC')->where('updated_at <', $article['updated_at'])->limit(1)->get()->getResultArray();
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
        $visitors       = $VisitModel->where('path', '/jadwal-kegiatan/'.$alias)->find();
        $viewvisit      = [];
        foreach ($visitors as $visit) {
            $viewvisit[]    = $visit->views;
        }

        // URL Encode
        $url        = base_url().'jadwal-kegiatan/'.$alias;
        $urlencode  = urlencode($url);

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['description'];
        $data['article']        = $article;
        $data['nextarticles']   = '/jadwal-kegiatan/'.$nexturl;
        $data['prevarticles']   = '/jadwal-kegiatan/'.$prevurl;
        $data['caturi']         = 'jadwal-kegiatan';
        $data['cattitle']       = 'Jadwal Kegiatan';
        $data['user']           = $creator;
        $data['visitors']       = array_sum($viewvisit);
        $data['url']            = $url;
        $data['urlencode']      = $urlencode;

        // Return Data To View
        return view('article', $data);
    }
}
