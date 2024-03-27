<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\ContentModel;
use App\Models\SlideshowModel;

class Home extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Models
        $ContentModel   = new ContentModel();
        $SlideshowModel = new SlideshowModel();
        
        // Populating Data
        $newses     = $ContentModel->where('catid', '12')->orderBy('publish_up', 'DESC')->limit(4)->find();
        $workshops  = $ContentModel->where('catid', '20')->orWhere('catid', '13')->orderBy('publish_up', 'DESC')->limit(3)->find();
        $schedules  = $ContentModel->where('catid', '17')->orderBy('publish_up', 'DESC')->limit(6)->find();
        $diklats    = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->limit(4)->find();
        $slideshows = $SlideshowModel->where('status', '1')->orderBy('id', 'DESC')->find();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "BBPPMPV Seni dan Budaya";
        $data['description']    = "Selamat datang di website BBPPMPVSB";
        $data['newses']         = $newses;
        $data['workshops']      = $workshops;
        $data['schedules']      = $schedules;
        $data['diklats']        = $diklats;
        $data['slideshows']     = $slideshows;

        // Return To View
        return view('home', $data);
        // return view('welcome_message');
    }
}
