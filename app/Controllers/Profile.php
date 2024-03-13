<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\ContentModel;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Models
        $ContentModel   = new ContentModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $profiles     = $ContentModel->where('catid', '25')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        } else {
            $profiles     = $ContentModel->where('catid', '25')->orderBy('publish_up', 'DESC')->find();
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Profil BBPPMPVSB";
        $data['description']    = "Tentang BBPPMPVSB";
        $data['profiles']       = $profiles;
        $data['count']          = count($profiles);
        $data['caturi']         = 'profil';
        $data['cattitle']       = 'Profil BBPPMPVSB';

        // Return Data To View
        return view('profile', $data);
    }
}
