<?php 
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\BeritaModel;
use App\Models\ArtistaModel;
use App\Models\DiklatModel;
use App\Models\ScheduleModel;
use App\Models\SeminarModel;
use App\Models\PhotoModel;
use App\Models\VideoModel;
use App\Models\SlideshowModel;
use App\Models\GroupModel;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;


class Upload extends BaseController
{
    protected $data;

    public function akun($id)
    {
        // Calling Model
        $GroupModel = new GroupModel();

        // Get Data
        $input  = $this->request->getPost();
        $users  = auth()->getProvider();
        $group  = $GroupModel->where('user_id',$id)->first();
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
            return redirect()->to('dashboard/editusers/'.$id)->withInput()->with('errors', $this->validator->getErrors());
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
                return redirect()->to('dashboard/editakun/'.$id)->withInput()->with('errors', $this->validator->getErrors());
            }

            $result = auth()->check([
                'email'    => auth()->user()->email,
                'password' => $input['current_pass'],
            ]);

            if( !$result->isOK() ) {
                $errors = [
                    'password'    => 'Kata Sandi Lama Tidak Sesuai',
                ];
                return redirect()->to('dashboard/editakun/'.$id)->withInput()->with('errors', $errors);
                return false;
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

        return redirect()->to('dashboard/editakun/'.$id)->with('message', "Data Akun Berhasil Di Perbaharui!");
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

        $artista = [
            'id'   => $id,
            'file' => $input['file'],
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
        $user   = $UserModel->find($this->data['uid']);

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $berita = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['gambar'],
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
            'images'        => "images/".$input['gambar'],
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

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $seminar = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['gambar'],
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
            'images'        => "images/".$input['gambar'],
            'description'   => $input['ringkasan'],
            'type'          => 0,
        ];

        // insert News
        $SeminarModel->save($seminar);
        return redirect()->to('dashboard/seminar')->with('message', "Seminar Berhasil Di Ubah!");
    }

    // Add Seminar
    public function addwebbinar()
    {
        // Calling Models
        $UserModel      = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $seminar = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['gambar'],
            'description'   => $input['ringkasan'],
            'type'          => 1,
        ];

        // insert News
        $SeminarModel->insert($seminar);
        return redirect()->to('dashboard/webbinar')->with('message', "Webinar Berhasil Di Tambahkan!");
    }

    // Edit Seminar
    public function editwebbinar($id){

        // Calling Models
        $UserModel      = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

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
            'images'        => "images/".$input['gambar'],
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

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $jadwal = [
            'userid'        => $user['id'],
            'title'         => $input['judul'],
            'alias'         => $aliases,
            'introtext'     => $input['pendahuluan'],
            'fulltext'      => $input['isi'],
            'images'        => "images/".$input['gambar'],
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
        $ScheduleModel   = new ScheduleModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

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
            'images'        => "images/".$input['gambar'],
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
        $UserModel      = new UsersModel();
        $DiklatModel    = new DiklatModel();

        // Get Data
        $input  = $this->request->getPost();
        $user   = $UserModel->find($this->data['uid']);

        // Alias
        $aliases = preg_replace('/\s+/', '-', $input['judul']);

        // News Data 
        $diklat = [
            'title'         => $input['judul'],
            'images'        => "images/".$input['gambar'],
        ];

        // insert News
        $DiklatModel->insert($diklat);
        return redirect()->to('dashboard/diklat')->with('message', "Diklat Berhasil Di Tambahkan!");
    }

    // Edit Diklat
    public function editdiklat($id){

        // Calling Models
        $DiklatModel    = new DiklatModel();

        // Get Data
        $input  = $this->request->getPost();

        // News Data 
        $diklat = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => "images/".$input['gambar'],
        ];

        // insert News
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

        // News Data 
        $foto = [
            'title'         => $input['judul'],
            'images'        => "images/".$input['gambar'],
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

        // News Data 
        $foto = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => "images/".$input['gambar'],
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
            'images'        => $input['gambar'],
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

        // Video Data 
        $video = [
            'id'            => $id,
            'title'         => $input['judul'],
            'images'        => "images/".$input['gambar'],
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
        
        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $slide = [
            'file'        => "img/slideshow/".$input['gambar'],
            'status'      => $status,
        ];

        // insert News
        $SlideshowModel->insert($slide);
        return redirect()->to('dashboard/slideshow')->with('message', "Slide Show Berhasil Di Tambahkan!");
    }

    // Edit Slideshow
    public function editslideshow($id){

        // Calling Models
        $SlideshowModel     = new SlideshowModel();

        // Get Data
        $input  = $this->request->getPost();

        if(isset($input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        // News Data 
        $foto = [
            'id'            => $id,
            'file'          => "img/slideshow/".$input['gambar'],
            'status'        => $status,
        ];

        // insert News
        $SlideshowModel->save($foto);
        return redirect()->to('dashboard/slideshow')->with('message', "Slide Show Berhasil Di Ubah!");
    }

    
}
?>