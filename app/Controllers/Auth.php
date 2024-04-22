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
        $usersmodel = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        $data = $this->data;
        $data['title'] = "Dashboard";
        $data['user'] = $user;
        return view('Views/admin/dashboard', $data);
    }

    // Berita Views
    public function berita()
    {

        // Calling Models
        $usersmodel     = new UsersModel();
        $BeritaModel    = new BeritaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $news = $BeritaModel->findAll();
        $users = $usersmodel->findAll();
        array_multisort($news, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Berita";
        $data['user']       = $user;
        $data['berita']     = $news;
        $data['users']      = $users;

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
        $seminar = $SeminarModel->findAll();
        $users = $usersmodel->findAll();
        array_multisort($seminar, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Seminar";
        $data['user']       = $user;
        $data['berita']     = $seminar;
        $data['users']      = $users;

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

        $SeminarModel->delete($seminar);

        die(json_encode(array($seminar)));
    }

    // Diklat Views
    public function diklat()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $DiklatModel   = new DiklatModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $diklat = $DiklatModel->findAll();
        $users = $usersmodel->findAll();
        array_multisort($diklat, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Diklat";
        $data['user']       = $user;
        $data['berita']     = $diklat;
        $data['users']      = $users;

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
        $SeminarModel    = new SeminarModel();

        // Get Data
        $seminar = $SeminarModel->find($id);

        $SeminarModel->delete($seminar);

        die(json_encode(array($seminar)));
    }

    // Jadwal Views
    public function jadwal()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ScheduleModel  = new ScheduleModel();

        // Get Data
        $user   = $usersmodel->find($this->data['uid']);
        $jadwal = $ScheduleModel->findAll();
        $users  = $usersmodel->findAll();
        array_multisort($jadwal, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard jadwal";
        $data['user']       = $user;
        $data['berita']     = $jadwal;
        $data['users']      = $users;

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
        $artista = $ArtistaModel->findAll();
        array_multisort($artista, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Majalah Artista";
        $data['user']       = $user;
        $data['artista']    = $artista;
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
        $photos = $PhotoModel->findAll();

        $data               = $this->data;
        $data['title']     = "Dashboard Galeri Foto";
        $data['user']       = $user;
        $data['photos']     = $photos;

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
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $artista = $ArtistaModel->find($id);

        $ArtistaModel->delete($artista);

        die(json_encode(array($artista)));
    }

    public function slideshow()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $SlideshowModel   = new SlideshowModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $slideshow = $SlideshowModel->findAll();
        array_multisort($slideshow,SORT_DESC);

        $data                   = $this->data;
        $data['title']          = "Dashboard Slideshow";
        $data['user']           = $user;
        $data['slideshow']      = $slideshow;

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
}
