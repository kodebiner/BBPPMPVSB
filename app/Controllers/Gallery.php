<?php

namespace App\Controllers;
use App\Models\ContentModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;

class Gallery extends BaseController
{
    protected $data;

    public function indexphoto()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ContentModel           = new ContentModel();

        // Search Engine
        // Populating Data
        // if (isset($input['search']) && !empty($input['search'])) {
        //     $galleries     = $ContentModel->where('catid', '18')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        // } else {
        //     $galleries     = $ContentModel->where('catid', '18')->orderBy('publish_up', 'DESC')->paginate(24, 'gallery');
        // }

        $galleriesdata     = $ContentModel->where('catid', '18')->orderBy('publish_up', 'DESC')->find();
        $galleries = [];
        foreach ($galleriesdata as $gallery) {
            $images = json_decode($gallery['images']);

            if (!empty($images->image_intro)) {
                $galleries[]     = $gallery;
            }
        }

        $page    = (int)($this->request->getGet('gallery') ?? 1);
        $perPage = 24;
        $total   = count($galleries);

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'uikit_full');

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Galeri Foto";
        $data['description']    = "Galeri Foto terkait BBPPMPVSB";
        $data['galleries']      = $galleries;
        $data['caturi']         = 'galeri/foto';
        $data['cattitle']       = 'Galeri Foto';
        $data['count']          = count($galleries);
        $data['pager']          = $pager_links;

        // Return Data To View
        return view('gallery', $data);
    }

    public function indexvideo()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ContentModel           = new ContentModel();

        // Search Engine
        // Populating Data
        // if (isset($input['search']) && !empty($input['search'])) {
        //     $galleries     = $ContentModel->where('catid', '16')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        // } else {
        //     $galleries     = $ContentModel->where('catid', '16')->orderBy('publish_up', 'DESC')->paginate(24, 'gallery');
        // }

        $galleriesdata     = $ContentModel->where('catid', '16')->orderBy('publish_up', 'DESC')->find();
        $galleries = [];
        foreach ($galleriesdata as $gallery) {
            $images = json_decode($gallery['images']);

            if (!empty($images->image_intro)) {
                $galleries[]     = $gallery;
            }
        }

        $page    = (int)($this->request->getGet('gallery') ?? 1);
        $perPage = 24;
        $total   = count($galleries);

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'uikit_full');

        // $galleriesdata     = $ContentModel->where('catid', '18')->orderBy('publish_up', 'DESC')->find();
        // foreach ($galleriesdata as $gallery) {
        //     $images = json_decode($gallery['images']);

        //     if (!empty($images->image_intro)) {
        //         $galleries     = $ContentModel->where('catid', '18')->orderBy('publish_up', 'DESC')->paginate(24, 'gallery');
        //     }
        // }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Galeri VIdeo";
        $data['description']    = "Galeri VIdeo terkait BBPPMPVSB";
        $data['galleries']      = $galleries;
        $data['caturi']         = 'galeri/video';
        $data['cattitle']       = 'Galeri VIdeo';
        $data['count']          = count($galleries);
        $data['pager']          = $pager_links;

        // Return Data To View
        return view('gallery', $data);
    }
}
