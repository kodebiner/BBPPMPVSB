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
        $name               = htmlspecialchars(strip_tags(htmlentities($input['name'])), ENT_QUOTES);
        $email              = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $phone              = htmlspecialchars(strip_tags(htmlentities($input['phone'])), ENT_QUOTES);
        $note               = htmlspecialchars(strip_tags(htmlentities($input['note'])), ENT_QUOTES);
        $laporan = [
            'name'          => $name,
            'email'         => $email,
            'phone'         => $phone,
            'note'          => $note,
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
        $content                = [];
        foreach ($input as $first => $second) {
            if (is_array($second)) {
                foreach ($second as $key => $val) {
                    $content[$first][$key]  = htmlspecialchars(strip_tags(htmlentities($val)), ENT_QUOTES);
                }
            } else  {
                $content[$first]            = htmlspecialchars(strip_tags(htmlentities($second)), ENT_QUOTES);
            }
        }
        
        $jsondata               = json_encode($content, TRUE);
        
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
