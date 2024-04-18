<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\ArtistaModel;


class Auth extends BaseController
{

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
        return view('Views/dashboard' , $data);
    }

    public function berita(){

        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        $data               = $this->data;
        $data['title']      = "Dashboard Berita";
        $data['user']       = $user;

        return view('Views/admin/berita',$data);

    }

    public function addberita()
    {
        // Calling Models
        $usersmodel     = new UsersModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Berita";
        $data['user']       = $user;

        return view('Views/admin/addberita',$data);
    }

    public function artista()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->findAll();
        array_multisort($artista,SORT_DESC);

        $data               = $this->data;
        $data['title']      = "Dashboard Majalah Artista";
        $data['user']       = $user;
        $data['artista']    = $artista;
        return view('Views/admin/artista',$data);
    }

    public function addartista()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);

        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Artista";
        $data['user']       = $user;
        // $data['artista']    = $artista;

        return view('Views/admin/addartista',$data);
    }

    public function editartista($id)
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->find($id);

        $data               = $this->data;
        $data['title']      = "Dashboard Ubah Artista";
        $data['user']       = $user;
        $data['artista']    = $artista;

        return view('Views/admin/editartista',$data);
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

        return view('Views/admin/ketegori',$data);
    }

    public function galeri()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->findAll();

        $data               = $this->data;
        $data['title']     = "Dashboard Galeri";
        $data['user']       = $user;
        $data['artista']    = $artista;

        return view('Views/admin/galeri',$data);
    }

    public function slideshow()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->findAll();

        $data               = $this->data;
        $data['title']     = "Dashboard Slideshow";
        $data['user']       = $user;
        $data['artista']    = $artista;

        return view('Views/admin/slideshow',$data);
    }

}
