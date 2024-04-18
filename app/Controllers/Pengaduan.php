<?php

namespace App\Controllers;
// use App\Models\ContentModel;
// use App\Models\CategoriesModel;
// use App\Models\UserModel;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected $data;

    public function standarpelayanan()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // // Calling Models
        // $ContentModel           = new ContentModel();

        // // Search Engine
        // // Populating Data
        // if (isset($input['search']) && !empty($input['search'])) {
        //     $newses     = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->like('title', $input['search'])->find();
        // } else {
        //     $newses     = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->paginate(10, 'news');
        // }

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Standar Pelayanan";
        $data['description']    = "Standar Pelayanan terkait BBPPMPVSB";
        // $data['newses']         = $newses;
        $data['caturi']         = 'layanan/standarpelayanan';
        $data['cattitle']       = 'Standar Pelayanan';
        // $data['count']          = count($newses);
        // $data['pager']          = $ContentModel->pager;

        // Return Data To View
        return view('standarpelayanan', $data);
    }

    public function indexpengaduan()//: string
    {
        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Pengaduan Masyarakat";
        $data['description']    = "Pengaduan Masyarakat terkait BBPPMPVSB";
        $data['caturi']         = 'pengaduan/formulirpengaduan';
        $data['cattitle']       = 'Pengaduan Masyarakat';

        // Return Data To View
        return view('formulirpengaduan', $data);
    }

    public function formaduan()//: string
    {
        // Calling Models
        $PengaduanModel     = new PengaduanModel();

        // Defining input
        $input = $this->request->getPost();

        // Validation Rules
        $rules = [
            'name' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} wajib diisi',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} wajib diisi',
                ],
            ],
            'phone' => [
                'label'  => 'Nomor HP/WA',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} wajib diisi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('pengaduan/formulirpengaduan')->withInput()->with('errors', $this->validator->getErrors());
        }

        $date               = date('Y-m-d H:i:s');
        $laporan = [
            'name'          => $input['name'],
            'email'         => $input['email'],
            'phone'         => $input['phone'],
            'note'          => $input['note'],
            'created_at'    => $date,
        ];

        // Insert Data Paket
        $PengaduanModel->insert($laporan);

        // Return
        return redirect()->back()->with('message', "Aduan Berhasil Terkirim");
    }
}
