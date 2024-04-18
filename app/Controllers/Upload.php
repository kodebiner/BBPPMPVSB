<?php 
namespace App\Controllers;

use App\Models\ArtistaModel;

class Upload extends BaseController
{
    public function foto()
    {
        $image      = \Config\Services::image();
        $validation = \Config\Services::validation();
        $input      = $this->request->getFile('uploads');

        // Validation Rules
        $rules = [
            'uploads'   => 'uploaded[uploads]|mime_in[uploads,application/pdf,application/macbinary,application/mac-binary,application/octet-stream,application/x-binary,application/x-macbinary,image/png,image/jpeg,image/pjpeg]',
        ];

        // Get Extention
        $ext = $input->getClientExtension();

        // Validating
        if (!$this->validate($rules)) {
            http_response_code(400);
            die(json_encode(array('message' => $this->validator->getErrors())));
        }

        if ($input->isValid() && !$input->hasMoved()) {
            // Saving uploaded file
            $filename = $input->getRandomName();
            $truename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
            $input->move(FCPATH . '/artista/foto/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function pdf()
    {
        $input      = $this->request->getFile('uploads');

        // Validation Rules
        $rules = [
            'uploads'   => 'uploaded[uploads]|mime_in[uploads,application/pdf]',
        ];

        // Get Extention
        $ext = $input->getClientExtension();

        // Validating
        if (!$this->validate($rules)) {
            http_response_code(400);
            die(json_encode(array('message' => $this->validator->getErrors())));
        }

        if ($input->isValid() && !$input->hasMoved()) {
            // Saving uploaded file
            $filename = $input->getRandomName();
            $truename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
            $input->move(FCPATH . '/artista/artikel/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    // Add Artista
    public function addartista()
    {
        $ArtistaModel = new ArtistaModel();

        $input = $this->request->getPost();

        // Validation Rules
        $rules = [
            'file' => [
                'label'  => 'File Majalah Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
            'foto' => [
                'label'  => 'Sampul Majalah Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addartista')->withInput()->with('errors', $this->validator->getErrors());
        }

        $artista = [
            'file' => $input['file'],
            'photo' => $input['foto'],
        ];
        $ArtistaModel->insert($artista);

        return redirect()->to('dashboard/artista')->with('message', "Data Berhasil Di Tambahkan!");
    }

    // Update Artista
    public function artista($id)
    {
        $ArtistaModel = new ArtistaModel();

        $input = $this->request->getPost();

        // Validation Rules
        $rules = [
            'file' => [
                'label'  => 'File Majalah Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
            'photo' => [
                'label'  => 'Sampul Majalah Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addartista')->withInput()->with('errors', $this->validator->getErrors());
        }

        $artista = [
            'id'   => $id,
            'file' => $input['file'],
            'photo' => $input['foto'],
        ];

        $ArtistaModel->save($artista);
        return redirect()->back()->with('message', "Data Berhasil Di Simpan!");
    }

    public function addberita()
    {
        $input = $this->request->getPost();
        dd($input);
    }
}
?>