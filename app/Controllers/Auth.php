<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ArtistaModel;
use App\Models\BeritaModel;
use App\Models\SeminarModel;
use App\Models\DiklatModel;
use App\Models\ScheduleModel;
use App\Models\PhotoModel;
use App\Models\VideoModel;
use App\Models\SlideshowModel;
use App\Models\PengaduanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\GroupModel;


class Auth extends BaseController
{
    protected $data;

    public function loginView()
    {
        return view('Views/login');
    }
    public function registerView()
    {
        return view('Views/register');
    }
    
    public function dashboard()
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $PermohonanModel    = new PermohonanModel();
        $PengaduanModel     = new PengaduanModel();

        // Get Data
        $user       = $usersmodel->find($this->data['uid']);
        $pengaduan  = $PengaduanModel->orderBy('status','ASC')->paginate(5,'pengaduan');
        $permohonan = $PermohonanModel->orderBy('status','ASC')->paginate(5,'permohonan');

        // Parsing data
        $data                       = $this->data;
        $data['title']              = "Dashboard";
        $data['user']               = $user;
        $data['permohonan']         = $permohonan;
        $data['pengaduan']          = $pengaduan;
        $data['pager']              = $PengaduanModel->pager;
        $data['pagerpermohonan']    = $PermohonanModel->pager;

        // Retrun View
        return view('Views/admin/dashboard', $data);
    }

    // Akun Views
    public function akun()
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        // $GroupModel         = new GroupModel();

        // Get Data
        $user       = $usersmodel->find($this->data['uid']);
        $users      = auth()->getProvider()->find($this->data['uid']);
        $group      = auth()->getProvider()->find($this->data['uid'])->getGroups();

        $account = [
            'id'        => $users->id,
            'name'      => $users->username,
            'email'     => $users->email,
            'group'     => $group[0],
            'password'  => $users->password,
        ];

        $level = [
            'superusers',
            'admin',
            'user',
        ];

        // Parsing data
        $data                       = $this->data;
        $data['title']              = "Dashboard Ubah Profil";
        $data['user']               = $user;
        $data['users']              = $account;
        $data['level']              = $level;

        // Return View
        return view('Views/admin/editakun', $data);
    }

    // Users View
    public function users()
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $GroupModel         = new GroupModel();

        // Get Data
        $user       = $usersmodel->find($this->data['uid']);
        $users      = auth()->getProvider()->findAll();
        $groups     = $GroupModel->findAll();

        // dd(auth()->getProvider()->find(1)->getGroups());
        $account = [];
        foreach($users as $acc){
            foreach ($groups as $group){
                if($acc->id === (int)$group['user_id']){
                    $account [] = [
                        'id'    => $acc->id,
                        'name'  => $acc->username,
                        'email' => $acc->email,
                        'group' => $group['group'],
                    ];
                }
            }
        }

        // Parsing data
        $data                       = $this->data;
        $data['title']              = "Dashboard Users";
        $data['user']               = $user;
        $data['users']              = $account;
        $data['groups']             = $groups;

        // Return View
        return view('Views/admin/users', $data);
    }

    public function addusers()
    {
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Users";
        $data['user']       = $user;

        return view('Views/admin/addusers', $data);
    }

    public function editusers($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $GroupModel         = new GroupModel();

        // Get Data
        $user       = $usersmodel->find($this->data['uid']);
        $users      = auth()->getProvider()->find($id);
        $group      = auth()->getProvider()->find($id)->getGroups();

        $account = [
            'id'        => $users->id,
            'name'      => $users->username,
            'email'     => $users->email,
            'group'     => $group[0],
            'password'  => $users->password,
        ];

        $level = [
            'superusers',
            'admin',
            'user',
        ];

        // Parsing data
        $data                       = $this->data;
        $data['title']              = "Dashboard Ubah Data Pengguna";
        $data['user']               = $user;
        $data['users']              = $account;
        $data['level']              = $level;

        return view('Views/admin/editusers', $data);
    }


    // Berita Views
    public function berita()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $BeritaModel    = new BeritaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $news = $BeritaModel->orderBy('updated_at', 'DESC')->paginate(20, 'news');
        $users = $usersmodel->findAll();
        array_multisort($news, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Berita";
        $data['user']       = $user;
        $data['berita']     = $news;
        $data['users']      = $users;
        $data['count']      = count($news);
        $data['pager']      = $BeritaModel->pager;

        return view('Views/admin/berita', $data);
    }

    public function addberita()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $BeritaModel    = new BeritaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Berita";
        $data['user']       = $user;

        return view('Views/admin/addberita', $data);
    }

    public function editberita($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $BeritaModel    = new BeritaModel();

        $user = $usersmodel->find($this->data['uid']);
        $news = $BeritaModel->find($id);
        $users = $usersmodel->findAll();
        array_multisort($news, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Berita";
        $data['user']       = $user;
        $data['users']      = $users;
        $data['news']       = $news;

        return view('Views/admin/editberita', $data);
    }

    public function removeberita($id)
    {
        // Calling Models
        $BeritaModel    = new BeritaModel();

        // Get Data
        $berita = $BeritaModel->find($id);

        // unlink image
        if(!empty($berita['images'])){
            unlink(FCPATH . $berita['images']);
        }

        $BeritaModel->delete($berita);

        die(json_encode(array($berita)));
    }

    // Seminar Views
    public function seminar()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $seminar = $SeminarModel->where('type','0')->orderBy('updated_at', 'DESC')->paginate(20, 'news');
        $users = $usersmodel->findAll();
        array_multisort($seminar, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Seminar";
        $data['user']       = $user;
        $data['berita']     = $seminar;
        $data['users']      = $users;
        $data['count']      = count($seminar);
        $data['pager']      = $SeminarModel->pager;

        return view('Views/admin/seminar', $data);
    }

    public function addseminar()
    {
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Seminar";
        $data['user']       = $user;

        return view('Views/admin/addseminar', $data);
    }

    public function editseminar($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $SeminarModel    = new SeminarModel();

        $user = $usersmodel->find($this->data['uid']);
        $Seminar = $SeminarModel->find($id);
        $users = $usersmodel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Seminar";
        $data['user']       = $user;
        $data['users']      = $users;
        $data['news']       = $Seminar;

        return view('Views/admin/editseminar', $data);
    }

    public function removeseminar($id)
    {
        // Calling Models
        $SeminarModel    = new SeminarModel();

        // Get Data
        $seminar = $SeminarModel->find($id);

        // unlink image
        if(!empty($seminar['images'])){
            unlink(FCPATH . $seminar['images']);
        }

        $SeminarModel->delete($seminar);

        die(json_encode(array($seminar)));
    }

    // Webbinar Views
    public function webbinar()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $SeminarModel   = new SeminarModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $seminar = $SeminarModel->where('type','1')->orderBy('updated_at', 'DESC')->paginate(20, 'news');
        $users = $usersmodel->findAll();
        array_multisort($seminar, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Web binar";
        $data['user']       = $user;
        $data['berita']     = $seminar;
        $data['users']      = $users;
        $data['count']      = count($seminar);
        $data['pager']      = $SeminarModel->pager;

        return view('Views/admin/webbinar', $data);
    }

    public function addwebbinar()
    {
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Webbinar";
        $data['user']       = $user;

        return view('Views/admin/addwebbinar', $data);
    }

    public function editwebbinar($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $SeminarModel    = new SeminarModel();

        $user = $usersmodel->find($this->data['uid']);
        $Seminar = $SeminarModel->find($id);
        $users = $usersmodel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Webbinar";
        $data['user']       = $user;
        $data['users']      = $users;
        $data['news']       = $Seminar;

        return view('Views/admin/editwebbinar', $data);
    }

    // Diklat Views
    public function diklat()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $DiklatModel   = new DiklatModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $diklat = $DiklatModel->orderBy('updated_at', 'DESC')->paginate(20, 'news');
        $users = $usersmodel->findAll();
        array_multisort($diklat, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Diklat";
        $data['user']       = $user;
        $data['berita']     = $diklat;
        $data['users']      = $users;
        $data['count']      = count($diklat);
        $data['pager']      = $DiklatModel->pager;

        return view('Views/admin/diklat', $data);
    }

    public function adddiklat()
    {
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Seminar";
        $data['user']       = $user;

        return view('Views/admin/adddiklat', $data);
    }

    public function editdiklat($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $DiklatModel    = new DiklatModel();

        $user = $usersmodel->find($this->data['uid']);
        $diklat = $DiklatModel->find($id);
        $users = $usersmodel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Diklat";
        $data['user']       = $user;
        $data['users']      = $users;
        $data['news']       = $diklat;

        return view('Views/admin/editdiklat', $data);
    }

    public function removediklat($id)
    {
        // Calling Models
        $DiklatModel = new DiklatModel();

        // Get Data
        $diklat = $DiklatModel->find($id);

        // unlink image
        if(!empty($diklat['images'])){
            unlink(FCPATH . $diklat['images']);
        }

        $DiklatModel->delete($diklat);

        die(json_encode(array($diklat)));
    }

    // Jadwal Views
    public function jadwal()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ScheduleModel  = new ScheduleModel();

        // Get Data
        $user   = $usersmodel->find($this->data['uid']);
        $jadwal = $ScheduleModel->orderBy('updated_at', 'DESC')->paginate(20, 'news');
        $users  = $usersmodel->findAll();
        array_multisort($jadwal, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard jadwal";
        $data['user']       = $user;
        $data['berita']     = $jadwal;
        $data['users']      = $users;
        $data['count']      = count($jadwal);
        $data['pager']      = $ScheduleModel->pager;

        return view('Views/admin/jadwal', $data);
    }

    public function addjadwal()
    {
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Jadwal";
        $data['user']       = $user;

        return view('Views/admin/addjadwal', $data);
    }

    public function editjadwal($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ScheduleModel    = new ScheduleModel();

        $user = $usersmodel->find($this->data['uid']);
        $jadwal = $ScheduleModel->find($id);
        $users = $usersmodel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Jadwal";
        $data['user']       = $user;
        $data['users']      = $users;
        $data['news']       = $jadwal;

        return view('Views/admin/editjadwal', $data);
    }

    public function removejadwal($id)
    {
        // Calling Models
        $ScheduleModel    = new ScheduleModel();

        // Get Data
        $jadwal = $ScheduleModel->find($id);

        // unlink image
        if(!empty($jadwal['images'])){
            unlink(FCPATH . $jadwal['images']);
        }

        $ScheduleModel->delete($jadwal);

        die(json_encode(array($jadwal)));
    }

    // Artista Views
    public function artista()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->orderBy('id', 'DESC')->paginate(20, 'news');
        array_multisort($artista, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Majalah Artista";
        $data['user']       = $user;
        $data['artista']    = $artista;
        $data['count']      = count($artista);
        $data['pager']      = $ArtistaModel->pager;
        return view('Views/admin/artista', $data);
    }

    public function addartista()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Artista";
        $data['user']       = $user;

        return view('Views/admin/addartista', $data);
    }

    public function editartista($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->find($id);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Ubah Artista";
        $data['user']       = $user;
        $data['artista']    = $artista;

        return view('Views/admin/editartista', $data);
    }

    public function removeartista($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $artista = $ArtistaModel->find($id);

        $ArtistaModel->delete($artista);

        die(json_encode(array($artista)));
    }


    public function kategori()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->findAll();

        $data               = $this->data;
        $data['title']      = "Dashboard Kategori";
        $data['user']       = $user;
        $data['artista']    = $artista;

        return view('Views/admin/ketegori', $data);
    }

    public function foto()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $PhotoModel     = new PhotoModel();

        // Get Data
        $user   = $usersmodel->find($this->data['uid']);
        $photos = $PhotoModel->orderBy('updated_at', 'DESC')->paginate(20, 'news');

        $data               = $this->data;
        $data['title']     = "Dashboard Galeri Foto";
        $data['user']       = $user;
        $data['photos']     = $photos;
        $data['count']      = count($photos);
        $data['pager']      = $PhotoModel->pager;

        return view('Views/admin/foto', $data);
    }

    public function addfoto()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
    
        // Get Data
        $user   = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Foto";
        $data['user']       = $user;

        return view('Views/admin/addfoto', $data);
    }

    public function editfoto($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $PhotoModel     = new PhotoModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $photo = $PhotoModel->find($id);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Ubah Galeri Foto";
        $data['user']       = $user;
        $data['news']       = $photo;

        return view('Views/admin/editfoto', $data);
    }

    public function removefoto($id)
    {
        // Calling Models
        $PhotoModel   = new PhotoModel();

        // Get Data
        $photo = $PhotoModel->find($id);

        $PhotoModel->delete($photo);

        die(json_encode(array($photo)));
    }

    // Video Views
    public function video(){
        // Calling Models
        $usersmodel     = new UsersModel();
        $VideoModel     = new VideoModel();

        // Get Data
        $user  = $usersmodel->find($this->data['uid']);
        $video = $VideoModel->orderBy('updated_at', 'DESC')->paginate(20, 'news');

        $data               = $this->data;
        $data['title']      = "Dashboard Galeri Video";
        $data['user']       = $user;
        $data['photos']     = $video;
        $data['count']      = count($video);
        $data['pager']      = $VideoModel->pager;

        return view('Views/admin/video', $data);
    }

    public function addvideo()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
    
        // Get Data
        $user   = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Video";
        $data['user']       = $user;

        return view('Views/admin/addvideo', $data);
    }

    public function editvideo($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $VideoModel     = new VideoModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $video = $VideoModel->find($id);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Ubah Galeri Video";
        $data['user']       = $user;
        $data['news']       = $video;

        return view('Views/admin/editvideo', $data);
    }

    public function removevideo($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $VideoModel   = new VideoModel();

        // Get Data
        $video = $VideoModel->find($id);

        $VideoModel->delete($video);

        die(json_encode(array($video)));
    }

    public function slideshow()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $SlideshowModel   = new SlideshowModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $slideshow = $SlideshowModel->orderBy('id', 'DESC')->paginate(20, 'news');
        array_multisort($slideshow,SORT_DESC);

        $data                   = $this->data;
        $data['title']          = "Dashboard Slideshow";
        $data['user']           = $user;
        $data['slideshow']      = $slideshow;
        $data['count']          = count($slideshow);
        $data['pager']          = $SlideshowModel->pager;

        return view('Views/admin/slideshow', $data);
    }

    public function addslideshow(){
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        $data                   = $this->data;
        $data['title']          = "Dashboard Tambah Slideshow";
        $data['user']           = $user;

        return view('Views/admin/addslideshow', $data);
    }

    public function editslideshow($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $SlideshowModel     = new SlideshowModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $slideshow = $SlideshowModel->find($id);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Ubah Foto Slide Show";
        $data['user']       = $user;
        $data['news']       = $slideshow;


        return view('Views/admin/editslideshow', $data);
    }

    public function removeslideshow($id)
    {
        // Calling Models
        $SlideshowModel   = new SlideshowModel();

        // Get Data
        $slideshow = $SlideshowModel->find($id);

        
        // $str 		= 'images/1713862437_77920d3d5873d5cda0f4.jpg';
        // $pattern 	= '/images/i';
        // $string  	= preg_replace($pattern, '', $str);
        // echo $string."</br>";

        // $result = preg_replace('|/|', "", $string);
        // echo $result;


        $SlideshowModel->delete($slideshow);

        die(json_encode(array($slideshow)));
    }

    // Pengaduan
    public function pengaduan($id)
    {
        // Calling Models
        $PengaduanModel    = new PengaduanModel();

        // Get Data
        $aduan = $PengaduanModel->find($id);

        $status = [
            'id'        => $aduan['id'],
            'status'    => "1",
        ];

        $PengaduanModel->save($status);

        die(json_encode(array($status)));
    }

    // Permohonan
    public function permohonan($id)
    {
        // Calling Models
        $PermohonanModel    = new PermohonanModel();

        // Get Data
        $permohonan = $PermohonanModel->find($id);

        $status = [
            'id'        => $permohonan['id'],
            'status'    => "1",
        ];

        $PermohonanModel->save($status);

        die(json_encode(array($status)));
    }

    public function errors()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
    }

}
