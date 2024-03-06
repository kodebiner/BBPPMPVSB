<?php

namespace App\Controllers;
use App\Models\ContentModel;

class Webinar extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ContentModel   = new ContentModel();

        // Search Engine
        // Populating Data
        if (isset($input['search']) && !empty($input['search'])) {
            $newses     = $ContentModel->where('catid', '13')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        } else {
            $newses     = $ContentModel->where('catid', '13')->orderBy('publish_up', 'DESC')->paginate(10, 'news');
        }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Webinar";
        $data['description']    = "Webinar terkait BBPPMPVSB";
        $data['newses']         = $newses;
        $data['pager']          = $ContentModel->pager;

        // Return Data To View
        return view('news', $data);
    }
}
