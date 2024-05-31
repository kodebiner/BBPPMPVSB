<?php

namespace App\Controllers;
use App\Models\PengaduanModel;
use App\Models\FieldgratModel;
use App\Models\GratifikasiModel;

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
            'type'          => $input['type'],
            'created_at'    => $date,
        ];

        // Insert Data Pengaduan
        $PengaduanModel->insert($laporan);

        // Return
        return redirect()->back()->with('message', "Aduan Berhasil Terkirim");
    }

    public function indexgratifikasi()//: string
    {
        // Calling Models
        $FieldgratModel         = new FieldgratModel();

        // Populating Data
        $fieldgrats             = $FieldgratModel->findAll();
        
        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Laporan Gratifikasi";
        $data['description']    = "Laporan Gratifikasi terkait BBPPMPVSB";
        $data['fieldgrats']     = $fieldgrats;
        $data['caturi']         = 'pengaduan/formulirgratifikasi';
        $data['cattitle']       = 'Laporan Gratifikasi';

        // Return Data To View
        return view('formulirgratifikasi', $data);
    }

    public function formgratifikasi()//: string
    {
        // Calling Models
        $GratifikasiModel       = new GratifikasiModel();

        // Populating Data
        $input                  = $this->request->getPost();
        $jsondata               = json_encode($input, TRUE);
        
        $date                   = date('Y-m-d H:i:s');
        
        $data = [
            'content'           => $jsondata,
            'status'            => 0,
            'created_at'        => $date,
        ];

        // Insert Data Gratifikasi
        $GratifikasiModel->insert($data);

        // Return
        return redirect()->back()->with('message', "Laporan Gratifikasi Berhasil Terkirim");
    }
}
