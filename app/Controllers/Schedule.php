<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ScheduleModel;

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
            $newses     = $ScheduleModel->orderBy('updated_at', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $ScheduleModel->orderBy('updated_at', 'DESC')->paginate(12, 'news');
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
        $UserModel              = new UserModel();
        $ScheduleModel           = new ScheduleModel();

        // Populating Data
        $article                = $ScheduleModel->where('alias', $alias)->first();
        $user                   = $UserModel->where('id', $article['created_by'])->first();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = $article['title'];
        $data['description']    = $article['description'];
        $data['article']        = $article;
        $data['caturi']         = 'jadwal-kegiatan';
        $data['cattitle']       = 'Jadwal Kegiatan';
        $data['user']           = $user;

        // Return Data To View
        return view('article', $data);
    }
}
