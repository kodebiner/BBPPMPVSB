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
        $data['user'] = $user;
        return view('Views/dashboard' , $data);
    }

    public function artista()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $ArtistaModel   = new ArtistaModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $artista = $ArtistaModel->findAll();

        $data               = $this->data;
        $data['user']       = $user;
        $data['artista']    = $artista;
        return view('Views/admin/artista',$data);
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
        $data['user']       = $user;
        $data['artista']    = $artista;
        return view('Views/admin/artista',$data);
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
        $data['user']       = $user;
        $data['artista']    = $artista;
        return view('Views/admin/artista',$data);
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
        $data['user']       = $user;
        $data['artista']    = $artista;
        return view('Views/admin/artista',$data);
    }

}
