<?php

namespace App\Controllers;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected $data;

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
            'note' => [
                'label'  => 'Pesan Pengaduan',
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
            'status'        => 0,
            'created_at'    => $date,
        ];

        // Insert Data Paket
        $PengaduanModel->insert($laporan);

        // Return
        return redirect()->back()->with('message', "Aduan Berhasil Terkirim");
    }
}
