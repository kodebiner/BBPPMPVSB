<?php

namespace App\Controllers;
use App\Models\PermohonanModel;

class Layanan extends BaseController
{
    protected $data;

    public function standarpelayanan()//: string
    {
        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Standar Pelayanan";
        $data['description']    = "Standar Pelayanan terkait BBPPMPVSB";
        $data['caturi']         = 'layanan/standarpelayanan';
        $data['cattitle']       = 'Standar Pelayanan';

        // Return Data To View
        return view('standarpelayanan', $data);
    }

    public function indexpermohonan()//: string
    {
        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Permohonan Informasi";
        $data['description']    = "Permohonan Informasi terkait BBPPMPVSB";
        $data['caturi']         = 'layanan/formulirpermohonan';
        $data['cattitle']       = 'Permohonan Informasi';

        // Return Data To View
        return view('formulirpermohonan', $data);
    }

    public function formpermohonan()//: string
    {
        // Calling Models
        $PermohonanModel        = new PermohonanModel();

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
            'address' => [
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
            'jobs' => [
                'label'  => 'Pekerjaan',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} wajib diisi',
                ],
            ],
            'note' => [
                'label'  => 'Informasi Yang Dibutuhkan',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} wajib diisi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('layanan/formulirpermohonan')->withInput()->with('errors', $this->validator->getErrors());
        }

        $date               = date('Y-m-d H:i:s');
        $permohonan = [
            'name'          => $input['name'],
            'address'       => $input['address'],
            'phone'         => $input['phone'],
            'note'          => $input['note'],
            'jobs'          => $input['jobs'],
            'status'        => 0,
            'created_at'    => $date,
        ];

        // Insert Data Paket
        $PermohonanModel->insert($permohonan);

        // Return
        return redirect()->back()->with('message', "Permohonan Informasi Berhasil Terkirim");
    }
}
