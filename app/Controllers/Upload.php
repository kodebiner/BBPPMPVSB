<?php 
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\BeritaModel;
use App\Models\ArtistaModel;
use App\Models\DiklatModel;
use App\Models\FotoDiklatModel;
use App\Models\ScheduleModel;
use App\Models\SeminarModel;
use App\Models\PhotoModel;
use App\Models\VideoModel;
use App\Models\SlideshowModel;
use App\Models\SurveyModel;
use App\Models\MaklumatModel;
use App\Models\GroupModel;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;


class Upload extends BaseController
{
    protected $data;

    public function akun()
    {
        // Calling Model
        $GroupModel = new GroupModel();

        // Get Data
        $input  = $this->request->getPost();
        $users  = auth()->getProvider();
        $group  = $GroupModel->where('user_id',$this->data['uid'])->first();
        // $account    = auth()->getProvider()->find($id);

        // Validation Rules
        $rules = [
            'username' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'level' => [
                'label'  => 'Level Akun',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/editusers/')->withInput()->with('errors', $this->validator->getErrors());
        }       

        if(!empty($input['password'])){

            $rules = [
                'password' => [
                    'label'  => 'Kata Sandi',
                    'rules'  => 'required|min_length[6]',
                    'errors' => [
                        'min_length'    => '{field} Minimal 6 Huruf atau Karakter',
                    ],
                ],
                'password_confirm' => [
                    'label'  => 'Konfirmasi Kata Sandi',
                    'rules'  => 'matches[password]',
                    'errors' => [
                        'matches' => '{field} Konfirmasi Kata Sandi Tidak Cocok',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->to('dashboard/editakun/')->withInput()->with('errors', $this->validator->getErrors());
            }

            $result = auth()->check([
                'email'    => auth()->user()->email,
                'password' => $input['current_pass'],
            ]);

            if( !$result->isOK() ) {
                $errors = [
                    'password'    => 'Kata Sandi Lama Tidak Sesuai',
                ];
                return redirect()->to('dashboard/editakun/')->withInput()->with('errors', $errors);
                return false;
            }
            
            $user = $users->findById($this->data['uid']);
            $user->fill([
                'password'  => $input['password'],
            ]);
            $users->save($user);
        }

        $user = $users->findById($this->data['uid']);
        $user->fill([
            'username'  => $input['username'],
            'email'     => $input['email'],
        ]);
        $users->save($user);

        $addgroup = [
            'id'    => $group['id'],
            'group' => $input['level'],
        ];
        $GroupModel->save($addgroup);

        return redirect()->to('dashboard/editakun/')->with('message', "Data Akun Berhasil Di Perbaharui!");
    }

    public function addusers()
    {
        $input = $this->request->getPost();
        $users = auth()->getProvider();

        // Validation Rules
        $rules = [
            'username' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'password' => [
                'label'  => 'Kata Sandi',
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required'      => '{field} harus di isi',
                    'min_length'    => '{field} Minimal 6 Huruf atau Karakter',
                ],
            ],
            'password_confirm' => [
                'label'  => 'Konfirmasi Kata Sandi',
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'matches'   => '{field} Konfirmasi Kata Sandi Tidak Cocok',
                    'required'  => '{field} harus di isi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addusers')->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = new User([
            'username' => $input['username'],
            'email'    => $input['email'],
            'password' => $input['password'],
        ]);
        $users->save($user);

        $user = $users->findById($users->getInsertID());

        $users->addToDefaultGroup($user);
        
        return redirect()->to('dashboard/users')->with('message', "Pengguna Baru Berhasil Di Tambahkan!");
        
    }

    public function editusers($id)
    {
        // Calling Model
        $GroupModel = new GroupModel();

        // Get Data
        $input  = $this->request->getPost();
        $users  = auth()->getProvider();
        $group  = $GroupModel->where('user_id',$id)->first();
        $account    = auth()->getProvider()->find($id);
        
        // Validation Rules
        $rules = [
            'username' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required'  => '{field} harus di isi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/editusers/'.$id)->withInput()->with('errors', $this->validator->getErrors());
        }
        
        if(!empty($input['password'])){

            $rules = [
                'password' => [
                    'label'  => 'Kata Sandi',
                    'rules'  => 'required|min_length[6]',
                    'errors' => [
                        'min_length'     => '{field} Minimal 6 Huruf atau Karakter',
                    ],
                ],
                'password_confirm' => [
                    'label'  => 'Konfirmasi Kata Sandi',
                    'rules'  => 'required|matches[password]',
                    'errors' => [
                        'matches' => '{field} Konfirmasi Kata Sandi Tidak Cocok',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->to('dashboard/editusers/'.$id)->withInput()->with('errors', $this->validator->getErrors());
            }

            $user = $users->findById($id);
            $user->fill([
                'password'  => $input['password'],
            ]);
            $users->save($user);
        }

        $user = $users->findById($id);
        $user->fill([
            'username'  => $input['username'],
            'email'     => $input['email'],
        ]);
        $users->save($user);

        $addgroup = [
            'id'    => $group['id'],
            'group' => $input['level'],
        ];
        $GroupModel->save($addgroup);
        
        return redirect()->to('dashboard/editusers/'.$id)->with('message', "Data Pengguna Berhasil Di Ubah!");
        
    }

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

    public function removefoto()
    {
        // Removing File
        $input = $this->request->getPost('foto');
        unlink(FCPATH . 'artista/foto/' . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    public function fotoberita()
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
            $input->move(FCPATH . "/images/", $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function fototinymce()
    {
        // error_reporting(E_ERROR | E_WARNING | E_PARSE);
        /***************************************************
         * Only these origins are allowed to upload images *
         ***************************************************/
        // $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://127.0.0.1:8000", "http://127.0.0.1");
        // $accepted_origins = array("http:///bbppmpvsb.local", "http://192.168.1.1", "http://127.0.0.1:8000", "http://127.0.0.1");
        // $accepted_origins = array("http://bbppmpvsb.local",);

        // /*********************************************
        //  * Change this line to set the upload folder *
        //  *********************************************/

        // $method = $_SERVER['REQUEST_METHOD'];
        // if ($method == 'OPTIONS') {
        //     if (isset($_SERVER['HTTP_ORIGIN'])) {
        //         if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
        //             header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        //             header("HTTP/1.1 200 OK");
        //             return;
        //         } else {
        //             header("HTTP/1.1 403 Origin Denied");
        //             return;
        //         }
        //     }
        // } elseif ($method == 'POST') {
        //     $imageFolder = "/images/";
        //     reset($_FILES);
        //     $temp = current($_FILES);
        //     if (is_uploaded_file($temp['tmp_name'])) {
        //         header('CUS_MSG1: hello');
        //         if (isset($_SERVER['HTTP_ORIGIN'])) {
        //             // same-origin requests won't set an origin. If the origin is set, it must be valid.
        //             if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
        //                 header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        //             } else {
        //                 header("HTTP/1.1 403 Origin Denied");
        //                 return;
        //             }
        //         }

        //         /*
        //     If your script needs to receive cookies, set images_upload_credentials : true in
        //     the configuration and enable the following two headers.
        //     */
        //         // header('Access-Control-Allow-Credentials: true');
        //         // header('P3P: CP="There is no P3P policy."');

        //         // Sanitize input
        //         if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        //             header("HTTP/1.1 400 Invalid file name.");
        //             return;
        //         }

        //         // Verify extension
        //         if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        //             header("HTTP/1.1 400 Invalid extension.");
        //             return;
        //         }

        //         // Accept upload if there was no origin, or if it is an accepted origin
        //         $filetowrite = $imageFolder . $temp['name'];
        //         move_uploaded_file($temp['tmp_name'], $filetowrite);

        //         // Respond to the successful upload with JSON.
        //         // Use a location key to specify the path to the saved image resource.
        //         // { location : '/your/uploaded/image/file'}
        //         echo json_encode(array('location' => 'http://' . $_SERVER['SERVER_NAME'] . $filetowrite));
        //         // echo json_encode(array('location' => 'http://bbppmpvsb.local' . $filetowrite));
        //         // echo json_encode(array('location' => 'http://bbppmpvsb.local' . $filetowrite));
        //         // return json_encode(array('location' => 'http://' . $_SERVER['SERVER_NAME'] . $filetowrite));
        //         // return json_encode(array('location' => 'http://bbppmpvsb.local' . $filetowrite));
        //     } else {
        //         // Notify editor that the upload failed
        //         header("HTTP/1.1 500 Server Error");
        //     }
        // } else {
        //     // Notify editor that the upload failed
        //     header("HTTP/1.1 500 Server Error");
        // }

        // $url = array(
        //     "http://localhost"
        // );

        reset($_FILES);
        $temp = current($_FILES);

        if (is_uploaded_file($temp['tmp_name'])) {
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name,Bad request");
                return;
            }
            
            // Validating File extensions
            if (! in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array(
                "gif",
                "jpg",
                "png"
            ))) {
                header("HTTP/1.1 400 Not an Image");
                return;
            }
            
            $fileName = "images/". $temp['name'];
            move_uploaded_file($temp['tmp_name'], $fileName);
            
            // Return JSON response with the uploaded file path.
            echo json_encode(array(
                'location' => 'http://bbppmpvsb.local/images/' . $fileName
            ));
        
        }
    }

    public function removefotoberita()
    {
        // Removing File
        $input = $this->request->getPost('foto');
        unlink(FCPATH . 'images/' . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    public function removefotodiklat()
    {
        // Removing File
        $input = $this->request->getPost('foto');
        unlink(FCPATH . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    public function clearthumbnail()
    {
        // Calling Model
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();

        // Popuating Data
        $input              = $this->request->getPost('thumb');
        $diklat             = $DiklatModel->where('images', $input)->first();

        // Removing Thumbnail
        $datainput          = [
            'id'        => $diklat['id'],
            'images'    => null,
        ];
        $DiklatModel->save($datainput);

        // Removing Photos
        $FotoDiklatModel->where('file', $input)->delete();

        // Return Message
        die(json_encode(array('errors', 'Thumbnail berhasil di hapus')));
    }

    public function removefotodiklatexist()
    {
        // Calling Model
        $FotoDiklatModel    = new FotoDiklatModel();

        // Removing File
        $input = $this->request->getPost('foto');
        unlink(FCPATH . $input);

        // Delete From Database
        $FotoDiklatModel->where('file', $input)->delete();

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    public function fotoseminar()
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
            $input->move(FCPATH . '/images/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function fotodiklat()
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
            $input->move(FCPATH . '/images/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function fotogaleri()
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
            $input->move(FCPATH . '/images/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function videogaleri()
    {
        $image      = \Config\Services::image();
        $validation = \Config\Services::validation();
        $input      = $this->request->getFile('uploads');

        // Validation Rules
        $rules = [
            'uploads'   => 'uploaded[uploads]|mime_in[uploads,application/pdf,application/macbinary,application/mac-binary,application/octet-stream,application/x-binary,application/x-macbinary,image/png,image/jpeg,image/pjpeg,video/mp4]',
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
            $input->move(FCPATH . '/images/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function fotojadwal()
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
            $input->move(FCPATH . '/images/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function fotoslideshow()
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
            $input->move(FCPATH . '/img/slideshow/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function pdf()
    {
        $validation = \Config\Services::validation();
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

    public function removepdf()
    {
        // Removing File
        $input = $this->request->getPost('file');
        unlink(FCPATH . 'artista/artikel/' . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Add Artista
    public function addartista()
    {
        $ArtistaModel = new ArtistaModel();

        $input = $this->request->getPost();

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
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

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        $artista = [
            'title'     => $input['judul'],
            'alias'     => $aliases,
            'file'      => $input['file'],
            'photo'     => $input['foto'],
        ];
        $ArtistaModel->insert($artista);

        return redirect()->to('dashboard/artista')->with('message', "Data Berhasil Di Tambahkan!");
    }

    // Update Artista
    public function artista($id)
    {
        $ArtistaModel   = new ArtistaModel();
        $artista        = $ArtistaModel->find($id);

        $input = $this->request->getPost();

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'file' => [
                'label'  => 'File Majalah Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
            'foto' => [
                'label'  => 'Foto Majalah Artista',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/editartista/'.$id)->withInput()->with('errors', $this->validator->getErrors());
        }

        if (!empty($input['file'])) {
            if (!empty($artista['file'])) {
                if ($input['file'] != $artista['file']) {
                    unlink(FCPATH . '/artista/artikel/' . $artista['file']);
                }
            }
        }

        if (!empty($input['foto'])) {
            if (!empty($artista['photo'])) {
                if ($input['foto'] != $artista['photo']) {
                    unlink(FCPATH . '/artista/foto/' . $artista['photo']);
                }
            }
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        $artista = [
            'id'    => $id,
            'title' => $input['judul'],
            'alias' => $aliases,
            'file'  => $input['file'],
            'photo' => $input['foto'],
        ];

        $ArtistaModel->save($artista);
        return redirect()->back()->with('message', "Data Berhasil Di Simpan!");
    }

    // Add Berita
    public function addberita()
    {
        // Calling Models
        $UserModel      = new UsersModel();
        $BeritaModel    = new BeritaModel();

        // Get Data
        $input  = $this->request->getPost();
        dd($input);
        $user   = $UserModel->find($this->data['uid']);

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Berita',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'pendahuluan' => [
                'label'  => 'Pendahuluan Berita',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto Berita',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addberita')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $berita = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['foto'],
            'description'   => $input['ringkasan'],
        ];

        // insert News
        $BeritaModel->insert($berita);
        return redirect()->to('dashboard/berita')->with('message', "Berita Berhasil Di Tambahkan!");
    }

    // Edit Berita
    public function editberita($id){

        // Calling Models
        $UserModel      = new UsersModel();
        $BeritaModel    = new BeritaModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);
        $photos = $this->request->getPost('foto');

        $fotoberita = $BeritaModel->find($id);

        if ($photos === $fotoberita['images']) {
            $xfoto = $fotoberita['images'];
        } else {
            unlink(FCPATH . $fotoberita['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $berita = [
            'id'            => $id,
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => $xfoto,
            'description'   => $input['ringkasan'],
        ];

        // insert News
        $BeritaModel->save($berita);
        return redirect()->to('dashboard/berita')->with('message', "Berita Berhasil Di Ubah!");
    }

    // Add Seminar
    public function addseminar()
    {
        // Calling Models
        $UserModel      = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Seminar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'pendahuluan' => [
                'label'  => 'Pendahuluan Seminar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto Seminar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addseminar')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $seminar = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['foto'],
            'description'   => $input['ringkasan'],
            'type'          => 0,
        ];

        // insert News
        $SeminarModel->insert($seminar);
        return redirect()->to('dashboard/seminar')->with('message', "Seminar Berhasil Di Tambahkan!");
    }

    // Edit Seminar
    public function editseminar($id){

        // Calling Models
        $UserModel      = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);
        $photos = $this->request->getPost('foto');

        $fotoseminar = $SeminarModel->find($id);

        if ($photos === $fotoseminar['images']) {
            $xfoto = $fotoseminar['images'];
        } else {
            unlink(FCPATH . $fotoseminar['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $seminar = [
            'id'            => $id,
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => $xfoto,
            'description'   => $input['ringkasan'],
            'type'          => 0,
        ];

        // insert News
        $SeminarModel->save($seminar);
        return redirect()->to('dashboard/seminar')->with('message', "Seminar Berhasil Di Ubah!");
    }

    // Add Webinar
    public function addwebbinar()
    {
        // Calling Models
        $UserModel      = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Webinar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'pendahuluan' => [
                'label'  => 'Pendahuluan Webinar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto Webinar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addwebbinar')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $seminar = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['foto'],
            'description'   => $input['ringkasan'],
            'type'          => 1,
        ];

        // insert News
        $SeminarModel->insert($seminar);
        return redirect()->to('dashboard/webbinar')->with('message', "Webinar Berhasil Di Tambahkan!");
    }

    // Edit Webinar
    public function editwebbinar($id){

        // Calling Models
        $UserModel      = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);
        $photos = $this->request->getPost('foto');

        $fotowebinar = $SeminarModel->find($id);

        if ($photos === $fotowebinar['images']) {
            $xfoto = $fotowebinar['images'];
        } else {
            unlink(FCPATH . $fotowebinar['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $seminar = [
            'id'            => $id,
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => $xfoto,
            'description'   => $input['ringkasan'],
            'type'          => 1,
        ];

        // insert News
        $SeminarModel->save($seminar);
        return redirect()->to('dashboard/webbinar')->with('message', "Webinar Berhasil Di Ubah!");
    }

    // Add Jadwal
    public function addjadwal()
    {
        // Calling Models
        $UserModel      = new UsersModel();
        $ScheduleModel  = new ScheduleModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Seminar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'pendahuluan' => [
                'label'  => 'Pendahuluan Seminar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto Seminar',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addjadwal')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $jadwal = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['foto'],
            'description'   => $input['ringkasan'],
        ];

        // insert News
        $ScheduleModel->insert($jadwal);
        return redirect()->to('dashboard/jadwal')->with('message', "Jadwal Berhasil Di Tambahkan!");
    }

    // Edit Jadwal
    public function editjadwal($id){

        // Calling Models
        $UserModel      = new UsersModel();
        $ScheduleModel  = new ScheduleModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);
        $photos = $this->request->getPost('foto');

        $fotojadwal = $ScheduleModel->find($id);

        if ($photos === $fotojadwal['images']) {
            $xfoto = $fotojadwal['images'];
        } else {
            unlink(FCPATH . $fotojadwal['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $jadwal = [
            'id'            => $id,
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => $xfoto,
            'description'   => $input['ringkasan'],
        ];

        // insert News
        $ScheduleModel->save($jadwal);
        return redirect()->to('dashboard/jadwal')->with('message', "Jadwal Berhasil Di Ubah!");
    }

    // Add Diklat
    public function adddiklat()
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Diklat',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto Diklat',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            foreach ($input['foto'] as $key => $photo) {
                unlink(FCPATH . 'images/' . $photo);
            }
            return redirect()->to('dashboard/adddiklat')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // Diklat Data 
        $diklat = [
            'title'         => $input['judul'],
            'text'          => $input['description'],
            'images'        => "images/".$input['thumbnail'],
        ];

        // insert Diklat
        $DiklatModel->insert($diklat);

        $diklatid   = $DiklatModel->getInsertID();

        // Foto Diklat Data
        foreach ($input['foto'] as $fid => $value) {
            // Foto Diklat Data 
            $fotodiklat = [
                'diklatid'      => $diklatid,
                'file'          => "images/".$value,
            ];
    
            // insert Foto Diklat
            $FotoDiklatModel->insert($fotodiklat);
        }
        return redirect()->to('dashboard/diklat')->with('message', "Diklat Berhasil Di Tambahkan!");
    }

    // Edit Diklat
    public function editdiklat($id){

        // Calling Models
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();

        // Getting Input
        $input              = $this->request->getPost();

        // Populating Data
        $diklats            = $DiklatModel->find($id);

        // if ($diklats['images'] == $input['thumbnail']) {
        //     $thumbnail      = $diklats['images'];
        // } else {
        //     $thumbnail      = $input['thumbnail'];
        // }

        if (!empty($input['foto-create'])) {
            foreach ($input['foto-create'] as $key => $newphoto) {
                // Foto Diklat Data 
                $fotodiklat = [
                    'diklatid'      => $id,
                    'file'          => $newphoto,
                ];
        
                // insert Foto Diklat
                $FotoDiklatModel->insert($fotodiklat);
            }
        }

        // Diklat Data 
        $diklat = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => $input['thumbnail'],
            'text'          => $input['description  '],
        ];

        // insert Diklat
        $DiklatModel->save($diklat);
        return redirect()->to('dashboard/diklat')->with('message', "Diklat Berhasil Di Ubah!");
    }

    // Add Foto Galeri
    public function addfotogaleri()
    {
        // Calling Models
        $PhotoModel    = new PhotoModel();

        // Get Data
        $input  = $this->request->getPost();

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Foto pada Galeri',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto pada Galeri',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addfoto')->withInput()->with('errors', $this->validator->getErrors());
        }

        // News Data 
        $foto = [
            'title'         => $input['judul'],
            'images'        => "images/".$input['foto'],
        ];

        // insert News
        $PhotoModel->insert($foto);
        return redirect()->to('dashboard/foto')->with('message', "Foto Berhasil Di Tambahkan!");
    }

    // Edit Foto Galeri
    public function editfotogaleri($id){

        // Calling Models
        $PhotoModel     = new PhotoModel();

        // Get Data
        $input  = $this->request->getPost();
        $photos = $this->request->getPost('foto');

        $fotogaleri = $PhotoModel->find($id);

        if ($photos === $fotogaleri['images']) {
            $xfoto = $fotogaleri['images'];
        } else {
            unlink(FCPATH . $fotogaleri['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // News Data 
        $foto = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => $xfoto,
        ];

        // insert News
        $PhotoModel->save($foto);
        return redirect()->to('dashboard/foto')->with('message', "Foto Berhasil Di Ubah!");
    }

    // Add Video Galeri
    public function addvideogaleri()
    {
        // Calling Models
        $VideoModel    = new VideoModel();

        // Video Data
        $input  = $this->request->getPost();

        // Validation Rules
        $rules = [
            'judul' => [
                'label'  => 'Judul Video',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'link' => [
                'label'  => 'Link Video',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'foto' => [
                'label'  => 'Thumbnail Video',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addvideo')->withInput()->with('errors', $this->validator->getErrors());
        }

        $url = $input['link'];

        function getYoutubeEmbedUrl($url)
        {
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            // return 'https://www.youtube.com/embed/' . $youtube_id ;
            return $youtube_id ;
        }

        $idlink = getYoutubeEmbedUrl($url);
        // $link = '<iframe width="560" height="315" src="'.$idlink.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';

        // News Data 
        $video = [
            'title'         => $input['judul'],
            'images'        => $input['foto'],
            'link'          => $idlink,
        ];

        // insert News
        $VideoModel->insert($video);
        return redirect()->to('dashboard/video')->with('message', "Video Berhasil Di Tambahkan!");
    }

    // Edit Video Galeri
    public function editvideogaleri($id){

        // Calling Models
        $VideoModel     = new VideoModel();

        // Get Data
        $input  = $this->request->getPost();
        $url = $input['link'];

        function YoutubeEmbedUrl($url)
        {
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            // return 'https://www.youtube.com/embed/' . $youtube_id ;
            return $youtube_id ;
        }

        $idlink = YoutubeEmbedUrl($url);

        $photos = $this->request->getPost('foto');

        $thumbnail = $VideoModel->find($id);

        if ($photos === $thumbnail['images']) {
            $xfoto = $thumbnail['images'];
        } else {
            unlink(FCPATH . $thumbnail['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // Video Data 
        $video = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => $xfoto,
            'link'          => $idlink,
        ];

        // insert News
        $VideoModel->save($video);
        return redirect()->to('dashboard/video')->with('message', "Video Berhasil Di Ubah!");
    }

    // Add Slideshow
    public function addslideshow()
    {
        // Calling Models
        $SlideshowModel    = new SlideshowModel();

        // Get Data
        $input  = $this->request->getPost();

        // Validation Rules
        $rules = [
            'foto' => [
                'label'  => 'Slideshow',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di upload',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addslideshow')->withInput()->with('errors', $this->validator->getErrors());
        }
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $slide = [
            'file'        => $input['foto'],
            'status'      => $status,
        ];

        // insert News
        $SlideshowModel->insert($slide);
        return redirect()->to('dashboard/slideshow')->with('message', "Slide Show Berhasil Di Tambahkan!");
    }

    // Edit Slideshow
    public function editslideshow($id)
    {
        // Calling Models
        $SlideshowModel     = new SlideshowModel();

        // Get Data
        $input  = $this->request->getPost();
        $photos = $this->request->getPost('foto');

        $fotoslideshow = $SlideshowModel->find($id);

        if ($photos === $fotoslideshow['file']) {
            $xfoto = $fotoslideshow['file'];
        } else {
            unlink(FCPATH . "img/slideshow/" . $fotoslideshow['file']);
            $xfoto = $input['foto'];
        }

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $foto = [
            'id'            => $id,
            'file'          => $xfoto,
            'status'        => $status,
        ];

        // insert News
        $SlideshowModel->save($foto);
        return redirect()->to('dashboard/slideshow')->with('message', "Slide Show Berhasil Di Ubah!");
    }

    public function removeslideshow()
    {
        // Removing File
        $input = $this->request->getPost('foto');
        unlink(FCPATH . 'img/slideshow/' . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Add Maklumat
    public function addmaklumat()
    {
        // Calling Models
        $MaklumatModel      = new MaklumatModel();

        // Get Data
        $input              = $this->request->getPost();
        $maklumat           = $MaklumatModel->first();

        // News Data
        if (empty($maklumat)) {
            $content = [
                'text'          => $input['konten'],
            ];
        } else {
            $content = [
                'id'            => $maklumat['id'],
                'text'          => $input['konten'],
            ];
        }

        // insert News
        $MaklumatModel->save($content);
        return redirect()->to('dashboard/maklumat')->with('message', "Maklumat Pelayanan Berhasil Di Tambahkan!");
    }

    // Upload File Hasil Survey
    public function pdfsurvey()
    {
        $validation = \Config\Services::validation();
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
            $input->move(FCPATH . '/survey/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function removepdfsurvey()
    {
        // Removing File
        $input = $this->request->getPost('file');
        unlink(FCPATH . 'survey/' . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Add Survey
    public function addsurvey()
    {
        // Calling Models
        $SurveyModel        = new SurveyModel();

        // Get Data
        $input              = $this->request->getPost();
        $survey             = $SurveyModel->first();

        // News Data
        if (empty($survey)) {
            $content = [
                'file'          => $input['file'],
            ];
        } else {
            unlink(FCPATH . 'survey/' . $survey['file']);
            $content = [
                'id'            => $survey['id'],
                'file'          => $input['file'],
            ];
        }

        // insert News
        $SurveyModel->save($content);
        return redirect()->to('dashboard/survey')->with('message', "Hasil Survey Berhasil Di Tambahkan!");
    }
}
?>