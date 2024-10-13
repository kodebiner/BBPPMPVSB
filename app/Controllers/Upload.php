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
use App\Models\FotoGaleriModel;
use App\Models\VideoModel;
use App\Models\SlideshowModel;
use App\Models\SurveyModel;
use App\Models\MaklumatModel;
use App\Models\PagesModel;
use App\Models\StandarPelayananModel;
use App\Models\RbiModel;
use App\Models\OtherMenuModel;
use App\Models\KemitraanModel;
use App\Models\FieldgratModel;
use App\Models\GratifikasiModel;
use App\Models\TagsModel;
use App\Models\ArticleTagsModel;
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

    public function clearthumbnailphoto()
    {
        // Calling Model
        $PhotoModel         = new PhotoModel();
        $FotoGaleriModel    = new FotoGaleriModel();

        // Popuating Data
        $input              = $this->request->getPost('thumb');
        $photos             = $PhotoModel->where('images', $input)->first();

        // Removing Thumbnail
        $datainput          = [
            'id'        => $photos['id'],
            'images'    => null,
        ];
        $PhotoModel->save($datainput);

        // Removing Photos
        $FotoGaleriModel->where('file', $input)->delete();

        // Return Message
        die(json_encode(array('errors', 'Thumbnail berhasil di hapus')));
    }

    public function removefotogaleriexist()
    {
        // Calling Model
        $FotoGaleriModel    = new FotoGaleriModel();

        // Removing File
        $input = $this->request->getPost('foto');
        unlink(FCPATH . $input);

        // Delete From Database
        $FotoGaleriModel->where('file', $input)->delete();

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
            $input->move(FCPATH . '/gratifikasi/', $truename . '.' . $ext);

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
        unlink(FCPATH . 'gratifikasi/' . $input);

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
                'label'  => 'Link Flipbook Majalah Artista',
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

            // if (!empty($input['file'])) {
            //     if (!empty($artista['file'])) {
            //         if ($input['file'] != $artista['file']) {
            //             unlink(FCPATH . '/artista/artikel/' . $artista['file']);
            //         }
            //     }
            // }

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
        $UserModel          = new UsersModel();
        $BeritaModel        = new BeritaModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $input  = $this->request->getPost();
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
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $berita = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['foto'],
            'description'   => $input['ringkasan'],
            'status'        => $status,
        ];

        // insert News
        $BeritaModel->insert($berita);
        $article = $BeritaModel->getInsertID();

        // insert Tags
        if (!empty($input['tags'])) {
            foreach ($input['tags'] as $tag) {
                $dataTag = $TagsModel->find($tag);
                if (empty($dataTag)) {
                    $TagsModel->insert(['title' => $tag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tagid, 'category' => 1]);
                } else {
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tag, 'category' => 1]);
                }
            }
        }

        return redirect()->to('dashboard/berita')->with('message', "Berita Berhasil Di Tambahkan!");
    }

    // Edit Berita
    public function editberita($id){

        // Calling Models
        $UserModel          = new UsersModel();
        $BeritaModel        = new BeritaModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $input              = $this->request->getPost();
        $user               = $UserModel->find($this->data['uid']);
        $photos             = $this->request->getPost('foto');

        $fotoberita         = $BeritaModel->find($id);

        if ($photos === $fotoberita['images']) {
            $xfoto = $fotoberita['images'];
        } else {
            unlink(FCPATH . $fotoberita['images']);
            $xfoto = "images/".$this->request->getPost('foto');
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

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
            'status'        => $status,
        ];

        // insert News
        $BeritaModel->save($berita);

        // Tags
        if (!empty($input['tags'])) {
            // update tags
            $currentTags    = $ArticleTagsModel->arrayTags($id, 1);
            $tag            = [];
            foreach ($currentTags as $tags) {
                $tag[] = $tags['tagsid'];
            }
            $inputTags = $input['tags'];
    
            // remove tags
            $removedTags = array_diff($tag, $inputTags);
            foreach ($removedTags as $removedTag) {
                $ArticleTagsModel->deleteTags($id, $removedTag, 1);
            }
    
            // adding tags
            $addedTags = array_diff($inputTags, $tag);
            foreach ($addedTags as $addedTag) {
                $Tags = $TagsModel->find($addedTag);
                if (!empty($Tags)) {
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $addedTag, 'category' => 1]);
                } else {
                    $TagsModel->insert(['title' => $addedTag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $tagid, 'category' => 1]);
                }
            }
        }
        return redirect()->to('dashboard/berita')->with('message', "Berita Berhasil Di Ubah!");
    }

    // Add Seminar
    public function addseminar()
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $SeminarModel       = new SeminarModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

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
            'status'        => $status,
        ];

        // insert News
        $SeminarModel->insert($seminar);
        $article = $SeminarModel->getInsertID();

        // insert Tags
        if (!empty($input['tags'])) {
            foreach ($input['tags'] as $tag) {
                $dataTag = $TagsModel->find($tag);
                if (empty($dataTag)) {
                    $TagsModel->insert(['title' => $tag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tagid, 'category' => 2]);
                } else {
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tag, 'category' => 2]);
                }
            }
        }
        return redirect()->to('dashboard/seminar')->with('message', "Seminar Berhasil Di Tambahkan!");
    }

    // Edit Seminar
    public function editseminar($id)
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $SeminarModel       = new SeminarModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

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
            'status'        => $status,
        ];

        // insert News
        $SeminarModel->save($seminar);

        // Tags
        if (!empty($input['tags'])) {
            // update tags
            $currentTags    = $ArticleTagsModel->arrayTags($id, 2);
            $tag            = [];
            foreach ($currentTags as $tags) {
                $tag[] = $tags['tagsid'];
            }
            $inputTags = $input['tags'];
    
            // remove tags
            $removedTags = array_diff($tag, $inputTags);
            foreach ($removedTags as $removedTag) {
                $ArticleTagsModel->deleteTags($id, $removedTag, 2);
            }
    
            // adding tags
            $addedTags = array_diff($inputTags, $tag);
            foreach ($addedTags as $addedTag) {
                $Tags = $TagsModel->find($addedTag);
                if (!empty($Tags)) {
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $addedTag, 'category' => 2]);
                } else {
                    $TagsModel->insert(['title' => $addedTag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $tagid, 'category' => 2]);
                }
            }
        }
        return redirect()->to('dashboard/seminar')->with('message', "Seminar Berhasil Di Ubah!");
    }

    // Add Webinar
    public function addwebbinar()
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $SeminarModel       = new SeminarModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

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
            'status'        => $status,
        ];

        // insert News
        $SeminarModel->insert($seminar);
        $article = $SeminarModel->getInsertID();

        // insert Tags
        if (!empty($input['tags'])) {
            foreach ($input['tags'] as $tag) {
                $dataTag = $TagsModel->find($tag);
                if (empty($dataTag)) {
                    $TagsModel->insert(['title' => $tag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tagid, 'category' => 2]);
                } else {
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tag, 'category' => 2]);
                }
            }
        }
        return redirect()->to('dashboard/webbinar')->with('message', "Webinar Berhasil Di Tambahkan!");
    }

    // Edit Webinar
    public function editwebbinar($id){

        // Calling Models
        $UserModel          = new UsersModel();
        $SeminarModel       = new SeminarModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

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
            'status'        => $status,
        ];

        // insert News
        $SeminarModel->save($seminar);

        // Tags
        if (!empty($input['tags'])) {
            // update tags
            $currentTags    = $ArticleTagsModel->arrayTags($id, 2);
            $tag            = [];
            foreach ($currentTags as $tags) {
                $tag[] = $tags['tagsid'];
            }
            $inputTags = $input['tags'];
    
            // remove tags
            $removedTags = array_diff($tag, $inputTags);
            foreach ($removedTags as $removedTag) {
                $ArticleTagsModel->deleteTags($id, $removedTag, 2);
            }
    
            // adding tags
            $addedTags = array_diff($inputTags, $tag);
            foreach ($addedTags as $addedTag) {
                $Tags = $TagsModel->find($addedTag);
                if (!empty($Tags)) {
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $addedTag, 'category' => 2]);
                } else {
                    $TagsModel->insert(['title' => $addedTag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $tagid, 'category' => 2]);
                }
            }
        }
        return redirect()->to('dashboard/webbinar')->with('message', "Webinar Berhasil Di Ubah!");
    }

    // Add Jadwal
    public function addjadwal()
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $ScheduleModel      = new ScheduleModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $jadwal = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['foto'],
            'description'   => $input['ringkasan'],
            'status'        => $status,
        ];

        // insert News
        $ScheduleModel->insert($jadwal);
        $article = $ScheduleModel->getInsertID();

        // insert Tags
        if (!empty($input['tags'])) {
            foreach ($input['tags'] as $tag) {
                $dataTag = $TagsModel->find($tag);
                if (empty($dataTag)) {
                    $TagsModel->insert(['title' => $tag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tagid, 'category' => 4]);
                } else {
                    $ArticleTagsModel->insert(['articleid' => $article, 'tagsid' => $tag, 'category' => 4]);
                }
            }
        }
        return redirect()->to('dashboard/jadwal')->with('message', "Jadwal Berhasil Di Tambahkan!");
    }

    // Edit Jadwal
    public function editjadwal($id)
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $ScheduleModel      = new ScheduleModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

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
            'status'        => $status,
        ];

        // insert News
        $ScheduleModel->save($jadwal);

        // Tags
        if (!empty($input['tags'])) {
            // update tags
            $currentTags    = $ArticleTagsModel->arrayTags($id, 4);
            $tag            = [];
            foreach ($currentTags as $tags) {
                $tag[] = $tags['tagsid'];
            }
            $inputTags = $input['tags'];
    
            // remove tags
            $removedTags = array_diff($tag, $inputTags);
            foreach ($removedTags as $removedTag) {
                $ArticleTagsModel->deleteTags($id, $removedTag, 4);
            }
    
            // adding tags
            $addedTags = array_diff($inputTags, $tag);
            foreach ($addedTags as $addedTag) {
                $Tags = $TagsModel->find($addedTag);
                if (!empty($Tags)) {
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $addedTag, 'category' => 4]);
                } else {
                    $TagsModel->insert(['title' => $addedTag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $tagid, 'category' => 4]);
                }
            }
        }
        return redirect()->to('dashboard/jadwal')->with('message', "Jadwal Berhasil Di Ubah!");
    }

    // Add Diklat
    public function adddiklat()
    {
        // Calling Models
        $UserModel          = new UsersModel();
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

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
        // $aliases = preg_replace('/\s+/', '-', $input['judul']);
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // Diklat Data 
        $diklat = [
            'title'         => $input['judul'],
            'text'          => $input['description'],
            'images'        => "images/".$input['thumbnail'],
            'status'        => $status,
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

        // insert Tags
        if (!empty($input['tags'])) {
            foreach ($input['tags'] as $tag) {
                $dataTag = $TagsModel->find($tag);
                if (empty($dataTag)) {
                    $TagsModel->insert(['title' => $tag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $diklatid, 'tagsid' => $tagid, 'category' => 3]);
                } else {
                    $ArticleTagsModel->insert(['articleid' => $diklatid, 'tagsid' => $tag, 'category' => 3]);
                }
            }
        }
        return redirect()->to('dashboard/diklat')->with('message', "Diklat Berhasil Di Tambahkan!");
    }

    // Edit Diklat
    public function editdiklat($id)
    {
        // Calling Models
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Getting Input
        $input              = $this->request->getPost();

        // Populating Data
        $diklats            = $DiklatModel->find($id);

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

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // Diklat Data 
        $diklat = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => $input['thumbnail'],
            'text'          => $input['description'],
            'status'        => $status,
        ];

        // insert Diklat
        $DiklatModel->save($diklat);

        // Tags
        if (!empty($input['tags'])) {
            // update tags
            $currentTags    = $ArticleTagsModel->arrayTags($id, 3);
            $tag            = [];
            foreach ($currentTags as $tags) {
                $tag[] = $tags['tagsid'];
            }
            $inputTags = $input['tags'];
        
            // remove tags
            $removedTags = array_diff($tag, $inputTags);
            foreach ($removedTags as $removedTag) {
                $ArticleTagsModel->deleteTags($id, $removedTag, 3);
            }
    
            // adding tags
            $addedTags = array_diff($inputTags, $tag);
            foreach ($addedTags as $addedTag) {
                $Tags = $TagsModel->find($addedTag);
                if (!empty($Tags)) {
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $addedTag, 'category' => 3]);
                } else {
                    $TagsModel->insert(['title' => $addedTag]);
                    $tagid = $TagsModel->getInsertID();
                    $ArticleTagsModel->insert(['articleid' => $id, 'tagsid' => $tagid, 'category' => 3]);
                }
            }
        }
        return redirect()->to('dashboard/diklat')->with('message', "Diklat Berhasil Di Ubah!");
    }

    // Add Foto Galeri
    public function addfotogaleri()
    {
        // Calling Models
        $PhotoModel         = new PhotoModel();
        $FotoGaleriModel    = new FotoGaleriModel();

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
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $foto = [
            'title'         => $input['judul'],
            'images'        => "images/".$input['thumbnail'],
            'status'        => $status,
        ];

        // insert News
        $PhotoModel->insert($foto);

        $photoid   = $PhotoModel->getInsertID();

        // Foto Galeri Data
        foreach ($input['foto'] as $fid => $value) {
            // Foto Galeri Data 
            $fotogaleri = [
                'photoid'       => $photoid,
                'file'          => "images/".$value,
            ];
    
            // insert Foto Galeri
            $FotoGaleriModel->insert($fotogaleri);
        }
        return redirect()->to('dashboard/foto')->with('message', "Foto Berhasil Di Tambahkan!");
    }

    // Edit Foto Galeri
    public function editfotogaleri($id){

        // Calling Models
        $PhotoModel         = new PhotoModel();
        $FotoGaleriModel    = new FotoGaleriModel();

        // Getting Input
        $input  = $this->request->getPost();

        // Populating Data
        $fotogaleri = $PhotoModel->find($id);

        if (!empty($input['foto-create'])) {
            foreach ($input['foto-create'] as $key => $newphoto) {
                // Foto Galeri Data 
                $fotophoto = [
                    'photoid'       => $id,
                    'file'          => $newphoto,
                ];
        
                // insert Foto Diklat
                $FotoGaleriModel->insert($fotophoto);
            }
        }

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // Foto Data 
        $foto = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => $input['thumbnail'],
            'status'        => $status,
        ];

        // insert Foto
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

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $video = [
            'title'         => $input['judul'],
            'images'        => $input['foto'],
            'link'          => $idlink,
            'status'        => $status,
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

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // Video Data 
        $video = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => $xfoto,
            'link'          => $idlink,
            'status'        => $status,
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

    // Add Profile
    public function addprofile()
    {
        // Calling Models
        $PagesModel         = new PagesModel();

        // Get Data
        $input              = $this->request->getPost();
        $profiles           = $PagesModel->where('name', 'Profile')->first();

        // News Data
        if (empty($profiles)) {
            $content = [
                'name'          => 'Profile',
                'content'       => $input['konten'],
            ];
        } else {
            $content = [
                'id'            => $profiles['id'],
                'content'       => $input['konten'],
            ];
        }

        // insert News
        $PagesModel->save($content);
        return redirect()->to('dashboard/profile')->with('message', "Profil Berhasil Di Ubah!");
    }

    // Add PPID
    public function addppid()
    {
        // Calling Models
        $PagesModel         = new PagesModel();

        // Get Data
        $input              = $this->request->getPost();
        $ppids              = $PagesModel->where('name', 'PPID')->first();

        // News Data
        if (empty($ppids)) {
            $content = [
                'name'          => 'PPID',
                'content'       => $input['konten'],
            ];
        } else {
            $content = [
                'id'            => $ppids['id'],
                'content'       => $input['konten'],
            ];
        }

        // insert News
        $PagesModel->save($content);
        return redirect()->to('dashboard/ppid')->with('message', "PPID Berhasil Di Ubah!");
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

    // Upload File Standar Pelayanan
    public function pdfsp()
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
            $input->move(FCPATH . '/standarpelayanan/', $truename . '.' . $ext);

            // Getting True Filename
            $returnFile = $truename . '.' . $ext;

            // Returning Message
            die(json_encode($returnFile));
        }
    }

    public function removepdfsp()
    {
        // Removing File
        $input = $this->request->getPost('file');
        unlink(FCPATH . 'standarpelayanan/' . $input);

        // Return Message
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Add Standar Pelayanan
    public function addsp()
    {
        // Calling Models
        $StandarPelayananModel        = new StandarPelayananModel();

        // Get Data
        $input              = $this->request->getPost();
        $sp             = $StandarPelayananModel->first();

        // News Data
        if (empty($sp)) {
            $content = [
                'file'          => $input['file'],
            ];
        } else {
            unlink(FCPATH . 'standarpelayanan/' . $sp['file']);
            $content = [
                'id'            => $sp['id'],
                'file'          => $input['file'],
            ];
        }

        // insert News
        $StandarPelayananModel->save($content);
        return redirect()->to('dashboard/standarpelayanan')->with('message', "Standar Pelayanan Berhasil Di Tambahkan!");
    }

    // Reordering Parent RBI
    public function reorderingparent()
    {
        // Calling Models
        $RbiModel     = new RbiModel();

        // Populating Data
        $input          = $this->request->getPOST();

        $parent         = $RbiModel->find($input['id']);

        // Processing Data
        if ($parent['ordering'] < $input['order']) {
            $upperParent = $RbiModel->where('parentid', '0')->where('ordering <=', $input['order'])->where('ordering >', $parent['ordering'])->find();
            foreach ($upperParent as $upper) {
                $upperSubmit = [
                    'id'        => $upper['id'],
                    'ordering'  => $upper['ordering'] - 1
                ];
                $RbiModel->save($upperSubmit);
            }
        } else {
            $lowerParent = $RbiModel->where('parentid', '0')->where('ordering >=', $input['order'])->where('ordering <', $parent['ordering'])->find();
            foreach ($lowerParent as $lower) {
                $lowerSubmit = [
                    'id'        => $lower['id'],
                    'ordering'  => $lower['ordering'] + 1
                ];
                $RbiModel->save($lowerSubmit);
            }
        }
        $currentSubmit = [
            'id'        => $input['id'],
            'ordering'  => $input['order']
        ];
        $RbiModel->save($currentSubmit);

        die(json_encode($currentSubmit));
    }

    // Reordering SubParent RBI
    public function reorderingsubparent()
    {
        // Calling Models
        $RbiModel       = new RbiModel();

        // Populating Data
        $input          = $this->request->getPOST();

        $subparent      = $RbiModel->find($input['id']);

        // Processing Data
        if ($subparent['ordering'] < $input['order']) {
            $upperPaket = $RbiModel->where('parentid', $input['parent'])->where('ordering <=', $input['order'])->where('ordering >', $subparent['ordering'])->find();
            foreach ($upperPaket as $upper) {
                $upperSubmit = [
                    'id'        => $upper['id'],
                    'ordering'  => $upper['ordering'] - 1
                ];
                $RbiModel->save($upperSubmit);
            }
        } else {
            $lowerPaket = $RbiModel->where('parentid', $input['parent'])->where('ordering >=', $input['order'])->where('ordering <', $subparent['ordering'])->find();
            foreach ($lowerPaket as $lower) {
                $lowerSubmit = [
                    'id'        => $lower['id'],
                    'ordering'  => $lower['ordering'] + 1
                ];
                $RbiModel->save($lowerSubmit);
            }
        }
        $currentSubmit = [
            'id'        => $input['id'],
            'parentid'  => $input['parent'],
            'ordering'  => $input['order']
        ];
        $RbiModel->save($currentSubmit);

        die(json_encode($currentSubmit));
    }

    // Reordering Child RBI
    public function reorderingchild()
    {
        // Calling Models
        $RbiModel       = new RbiModel();

        // Populating Data
        $input          = $this->request->getPOST();

        $child          = $RbiModel->find($input['id']);

        // Processing Data
        if ($child['ordering'] < $input['order']) {
            $upperPaket = $RbiModel->where('parentid', $input['parent'])->where('ordering <=', $input['order'])->where('ordering >', $child['ordering'])->find();
            foreach ($upperPaket as $upper) {
                $upperSubmit = [
                    'id'        => $upper['id'],
                    'ordering'  => $upper['ordering'] - 1
                ];
                $RbiModel->save($upperSubmit);
            }
        } else {
            $lowerPaket = $RbiModel->where('parentid', $input['parent'])->where('ordering >=', $input['order'])->where('ordering <', $child['ordering'])->find();
            foreach ($lowerPaket as $lower) {
                $lowerSubmit = [
                    'id'        => $lower['id'],
                    'ordering'  => $lower['ordering'] + 1
                ];
                $RbiModel->save($lowerSubmit);
            }
        }
        $currentSubmit = [
            'id'        => $input['id'],
            'parentid'  => $input['parent'],
            'ordering'  => $input['order']
        ];
        $RbiModel->save($currentSubmit);

        die(json_encode($currentSubmit));
    }

    // Add RBI
    public function addrbi()
    {
        // Calling Models
        $RbiModel       = new RbiModel();

        // Get Data
        $input          = $this->request->getPost();

        // Validation Rules
        $rules = [
            'title' => [
                'label'  => 'Judul RBI',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'type' => [
                'label'  => 'Tipe RBI',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di pilih',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addrbi')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['title']);

        // Save Data
        $lastOrder      = $RbiModel->where('parentid', $input['type'])->orderBy('ordering', 'DESC')->first();
        if (!empty($lastOrder)) {
            $order = $lastOrder['ordering'] + 1;
        } else {
            $order = '1';
        }

        // RBI Data 
        $data = [
            'parentid'      => $input['type'],
            'title'         => $input['title'],
            'alias'         => $aliases,
            'content'       => $input['content'],
            'ordering'      => $order,
        ];

        // insert RBI
        $RbiModel->insert($data);
        return redirect()->to('dashboard/rbi')->with('message', "RBI Berhasil Di Tambahkan!");
    }

    // Edit RBI
    public function editrbi($id){

        // Calling Models
        $RbiModel       = new RbiModel();

        // Get Data
        $input          = $this->request->getPost();

        // Alias
        $aliases        = preg_replace('/\s+/', '-', $input['title']);

        // News Data 
        $data = [
            'id'            => $id,
            'parentid'      => $input['type'],
            'title'         => $input['title'],
            'alias'         => $aliases,
            'content'       => $input['content'],
        ];

        // insert News
        $RbiModel->save($data);
        return redirect()->to('dashboard/rbi')->with('message', "RBI Berhasil Di Ubah!");
    }

    // Reordering Other Menu
    public function reorderingothermenu()
    {
        // Calling Models
        $OtherMenuModel = new OtherMenuModel();

        // Populating Data
        $input          = $this->request->getPOST();

        $othermenu      = $OtherMenuModel->find($input['id']);

        // Processing Data
        if ($othermenu['ordering'] < $input['order']) {
            $upperPaket = $OtherMenuModel->where('ordering <=', $input['order'])->where('ordering >', $othermenu['ordering'])->find();
            foreach ($upperPaket as $upper) {
                $upperSubmit = [
                    'id'        => $upper['id'],
                    'ordering'  => $upper['ordering'] - 1
                ];
                $OtherMenuModel->save($upperSubmit);
            }
        } else {
            $lowerPaket = $OtherMenuModel->where('ordering >=', $input['order'])->where('ordering <', $othermenu['ordering'])->find();
            foreach ($lowerPaket as $lower) {
                $lowerSubmit = [
                    'id'        => $lower['id'],
                    'ordering'  => $lower['ordering'] + 1
                ];
                $OtherMenuModel->save($lowerSubmit);
            }
        }
        $currentSubmit = [
            'id'        => $input['id'],
            'ordering'  => $input['order']
        ];
        $OtherMenuModel->save($currentSubmit);

        die(json_encode($currentSubmit));
    }

    // Add Menu Lainnya
    public function addothermenu()
    {
        // Calling Models
        $OtherMenuModel = new OtherMenuModel();

        // Get Data
        $input          = $this->request->getPost();

        // Validation Rules
        $rules = [
            'title' => [
                'label'  => 'Judul Menu',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addothermenu')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['title']);

        // Save Data
        $lastOrder      = $OtherMenuModel->orderBy('ordering', 'DESC')->first();
        if (!empty($lastOrder)) {
            $order = $lastOrder['ordering'] + 1;
        } else {
            $order = '1';
        }

        // RBI Data 
        $data = [
            'title'         => $input['title'],
            'alias'         => $aliases,
            'content'       => $input['content'],
            'ordering'      => $order,
        ];

        // insert RBI
        $OtherMenuModel->insert($data);
        return redirect()->to('dashboard/othermenu')->with('message', "Menu Lainnya Berhasil Di Tambahkan!");
    }

    // Edit Menu Lainnya
    public function editothermenu($id){

        // Calling Models
        $OtherMenuModel = new OtherMenuModel();

        // Get Data
        $input          = $this->request->getPost();

        // Alias
        $aliases        = preg_replace('/\s+/', '-', $input['title']);

        // News Data 
        $data = [
            'id'            => $id,
            'title'         => $input['title'],
            'alias'         => $aliases,
            'content'       => $input['content'],
        ];

        // insert News
        $OtherMenuModel->save($data);
        return redirect()->to('dashboard/othermenu')->with('message', "Menu Lainnya Berhasil Di Ubah!");
    }

    // Reordering Kemitraan
    public function reorderingkemitraan()
    {
        // Calling Models
        $KemitraanModel = new KemitraanModel();

        // Populating Data
        $input          = $this->request->getPOST();

        $kemitraan      = $KemitraanModel->find($input['id']);

        // Processing Data
        if ($kemitraan['ordering'] < $input['order']) {
            $upperPaket = $KemitraanModel->where('ordering <=', $input['order'])->where('ordering >', $kemitraan['ordering'])->find();
            foreach ($upperPaket as $upper) {
                $upperSubmit = [
                    'id'        => $upper['id'],
                    'ordering'  => $upper['ordering'] - 1
                ];
                $KemitraanModel->save($upperSubmit);
            }
        } else {
            $lowerPaket = $KemitraanModel->where('ordering >=', $input['order'])->where('ordering <', $kemitraan['ordering'])->find();
            foreach ($lowerPaket as $lower) {
                $lowerSubmit = [
                    'id'        => $lower['id'],
                    'ordering'  => $lower['ordering'] + 1
                ];
                $KemitraanModel->save($lowerSubmit);
            }
        }
        $currentSubmit = [
            'id'        => $input['id'],
            'ordering'  => $input['order']
        ];
        $KemitraanModel->save($currentSubmit);

        die(json_encode($currentSubmit));
    }

    // Add Menu Lainnya
    public function addkemitraan()
    {
        // Calling Models
        $KemitraanModel = new KemitraanModel();

        // Get Data
        $input          = $this->request->getPost();

        // Validation Rules
        $rules = [
            'title' => [
                'label'  => 'Judul Menu',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addkemitraan')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['title']);

        // Save Data
        $lastOrder      = $KemitraanModel->orderBy('ordering', 'DESC')->first();
        if (!empty($lastOrder)) {
            $order = $lastOrder['ordering'] + 1;
        } else {
            $order = '1';
        }

        // RBI Data 
        $data = [
            'title'         => $input['title'],
            'alias'         => $aliases,
            'content'       => $input['content'],
            'ordering'      => $order,
        ];

        // insert RBI
        $KemitraanModel->insert($data);
        return redirect()->to('dashboard/kemitraan')->with('message', "Menu Kemitraan Berhasil Di Tambahkan!");
    }

    // Edit Menu Lainnya
    public function editkemitraan($id){

        // Calling Models
        $KemitraanModel = new KemitraanModel();

        // Get Data
        $input          = $this->request->getPost();

        // Alias
        $aliases        = preg_replace('/\s+/', '-', $input['title']);

        // News Data 
        $data = [
            'id'            => $id,
            'title'         => $input['title'],
            'alias'         => $aliases,
            'content'       => $input['content'],
        ];

        // insert News
        $KemitraanModel->save($data);
        return redirect()->to('dashboard/kemitraan')->with('message', "Menu Kemitraan Berhasil Di Ubah!");
    }

    // Add Gratifikasi
    public function addgratifikasi()
    {
        // Calling Models
        $FieldgratModel     = new FieldgratModel();

        // Get Data
        $input              = $this->request->getPost();

        // Validation Rules
        $rules = [
            'name' => [
                'label'  => 'Name Inputan',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di isi',
                ],
            ],
            'type' => [
                'label'  => 'Tipe Inputan',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '{field} harus di pilih',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/addgratifkasi')->withInput()->with('errors', $this->validator->getErrors());
        }
        
        if(isset($input['wajib'])){
            $wajib = 1;
        }else{
            $wajib = 0;
        }

        // Alias
        $aliases        = preg_replace('/\s+/', '_', $input['name']);

        // News Data 
        $gratifikasi = [
            'name'          => $input['name'],
            'alias'         => strtolower($aliases),
            'wajib'         => $wajib,
            'type'          => $input['type'],
        ];

        // insert News
        $FieldgratModel->insert($gratifikasi);
        return redirect()->to('dashboard/gratifikasi')->with('message', "Inputan Gratifikasi Berhasil Di Tambahkan!");
    }

    // Edit Gratifikasi
    public function editgratifikasi($id){

        // Calling Models
        $FieldgratModel     = new FieldgratModel();

        // Get Data
        $input              = $this->request->getPost();

        if(isset($input['wajib'])){
            $wajib = 1;
        }else{
            $wajib = 0;
        }

        // Alias
        $aliases        = preg_replace('/\s+/', '_', $input['name']);

        // News Data 
        $gratifikasi = [
            'id'            => $id,
            'name'          => $input['name'],
            'alias'         => strtolower($aliases),
            'wajib'         => $wajib,
            'type'          => $input['type'],
        ];

        // insert News
        $FieldgratModel->save($gratifikasi);
        return redirect()->to('dashboard/gratifikasi')->with('message', "Inputan Gratifikasi Berhasil Di Ubah!");
    }
}
?>