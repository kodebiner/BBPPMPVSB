<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ArtistaModel;
use App\Models\BeritaModel;
use App\Models\SeminarModel;
use App\Models\DiklatModel;
use App\Models\FotoDiklatModel;
use App\Models\ScheduleModel;
use App\Models\PhotoModel;
use App\Models\FotoGaleriModel;
use App\Models\VideoModel;
use App\Models\SlideshowModel;
use App\Models\PengaduanModel;
use App\Models\PermohonanModel;
use App\Models\SurveyModel;
use App\Models\StandarPelayananModel;
use App\Models\MaklumatModel;
use App\Models\PagesModel;
use App\Models\RbiModel;
use App\Models\OtherMenuModel;
use App\Models\KemitraanModel;
use App\Models\FieldgratModel;
use App\Models\GratifikasiModel;
use App\Models\TagsModel;
use App\Models\ArticleTagsModel;
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
        $GratifikasiModel   = new GratifikasiModel();

        // Get Data
        $user               = $usersmodel->find($this->data['uid']);
        $users              = $usersmodel->findAll();
        $pengaduan          = $PengaduanModel->orderBy('created_at','DESC')->paginate(10,'pengaduan');
        $permohonan         = $PermohonanModel->orderBy('created_at','DESC')->paginate(10,'permohonan');
        $gratifikasi        = $GratifikasiModel->orderBy('id','DESC')->paginate(10,'gratifikasi');

        // dd($gratifikasi);
        // Parsing data
        $data                       = $this->data;
        $data['title']              = "Dashboard";
        $data['user']               = $user;
        $data['users']              = $users;
        $data['permohonan']         = $permohonan;
        $data['pengaduan']          = $pengaduan;
        $data['gratifikasi']        = $gratifikasi;
        $data['pager']              = $PengaduanModel->pager;
        $data['pagerpermohonan']    = $PermohonanModel->pager;
        $data['pagergratifikasi']   = $GratifikasiModel->pager;

        // Retrun View
        return view('Views/admin/dashboard', $data);
    }

    // Export Pengaduan
    public function exportpengaduan()
    {
        // Calling Models
        $usersmodel             = new UsersModel();
        $PengaduanModel         = new PengaduanModel();

        // Populating Data
        $startdate              = date('Y-m-1') . ' 00:00:00';
        $enddate                = date('Y-m-t') . ' 23:59:59';
        $users                  = $usersmodel->findAll();
        $pengaduan              = $PengaduanModel->where('created_at >=', $startdate)->where('created_at <=', $enddate)->orderBy('created_at','DESC')->find();

        // Parsing Data to View
        $data                   = $this->data;
        $data['pengaduan']      = $pengaduan;
        $data['startdate']      = $startdate;
        $data['users']          = $users;

        // Return View
        return view('Views/admin/exportaduan', $data);
    }

    // Export Permohonan
    public function exportpermohonan()
    {
        // Calling Models
        $usersmodel             = new UsersModel();
        $PermohonanModel        = new PermohonanModel();

        // Populating Data
        $startdate              = date('Y-m-1') . ' 00:00:00';
        $enddate                = date('Y-m-t') . ' 23:59:59';
        $users                  = $usersmodel->findAll();
        $permohonan             = $PermohonanModel->where('created_at >=', $startdate)->where('created_at <=', $enddate)->orderBy('created_at','DESC')->find();

        // Parsing Data to View
        $data                   = $this->data;
        $data['permohonan']     = $permohonan;
        $data['startdate']      = $startdate;
        $data['users']          = $users;

        // Return View
        return view('Views/admin/exportpermohonan', $data);
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

        // Parsing data
        $data                       = $this->data;
        $data['title']              = "Dashboard Ubah Profil";
        $data['user']               = $user;
        $data['users']              = $account;

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
        $users      = auth()->getProvider()->where('id !=',$this->data['uid'])->paginate(20, 'news');
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
        $data['pager']              = auth()->getProvider()->pager;

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
        $data['level']      = ['superadmin', 'admin', 'user'];

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
            'superadmin',
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

    public function removeusers($id)
    {

        // Calling Models
        $usersmodel         = new UsersModel();
        $GroupModel         = new GroupModel();

        // Get Data
        $user      = auth()->getProvider()->find($id);
        $users     = auth()->getProvider()->findAll();
        $group     = auth()->getProvider()->find($user->id)->getGroups();


        $usersmodel->delete($user);

        die(json_encode(array($user)));
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
        $usersmodel         = new UsersModel();
        $BeritaModel        = new BeritaModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $tags = $TagsModel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Berita";
        $data['user']       = $user;
        $data['tags']       = $tags;

        return view('Views/admin/addberita', $data);
    }

    public function editberita($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $BeritaModel        = new BeritaModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        $articletags        = $ArticleTagsModel->where('articleid', $id)->where('category', '1')->find();
        $tags               = $TagsModel->findAll();
        $user               = $usersmodel->find($this->data['uid']);
        $news               = $BeritaModel->find($id);
        $users              = $usersmodel->findAll();
        array_multisort($news, SORT_DESC);

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Edit Berita";
        $data['user']           = $user;
        $data['users']          = $users;
        $data['news']           = $news;
        $data['tags']           = $tags;
        $data['articletags']    = $articletags;

        return view('Views/admin/editberita', $data);
    }

    public function removeberita($id)
    {
        // Calling Models
        $BeritaModel        = new BeritaModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $berita = $BeritaModel->find($id);

        // Delete Tags
        $ArticleTagsModel->where('articleid', $id)->where('category', '1')->delete();

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
        $usersmodel         = new UsersModel();
        $SeminarModel       = new SeminarModel();

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
        $usersmodel         = new UsersModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $tags = $TagsModel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Seminar";
        $data['user']       = $user;
        $data['tags']       = $tags;

        return view('Views/admin/addseminar', $data);
    }

    public function editseminar($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $SeminarModel       = new SeminarModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        $articletags        = $ArticleTagsModel->where('articleid', $id)->where('category', '2')->find();
        $tags               = $TagsModel->findAll();
        $user               = $usersmodel->find($this->data['uid']);
        $Seminar            = $SeminarModel->find($id);
        $users              = $usersmodel->findAll();

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Edit Seminar";
        $data['user']           = $user;
        $data['users']          = $users;
        $data['news']           = $Seminar;
        $data['tags']           = $tags;
        $data['articletags']    = $articletags;

        return view('Views/admin/editseminar', $data);
    }

    public function removeseminar($id)
    {
        // Calling Models
        $SeminarModel       = new SeminarModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $seminar = $SeminarModel->find($id);

        // Delete Tags
        $ArticleTagsModel->where('articleid', $id)->where('category', '2')->delete();

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
        $usersmodel         = new UsersModel();
        $SeminarModel       = new SeminarModel();

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
        $usersmodel         = new UsersModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $user = $usersmodel->find($this->data['uid']);
        $tags = $TagsModel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Webbinar";
        $data['user']       = $user;
        $data['tags']       = $tags;

        return view('Views/admin/addwebbinar', $data);
    }

    public function editwebbinar($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $SeminarModel       = new SeminarModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        $articletags        = $ArticleTagsModel->where('articleid', $id)->where('category', '2')->find();
        $tags               = $TagsModel->findAll();
        $user               = $usersmodel->find($this->data['uid']);
        $Seminar            = $SeminarModel->find($id);
        $users              = $usersmodel->findAll();

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Edit Webbinar";
        $data['user']           = $user;
        $data['users']          = $users;
        $data['news']           = $Seminar;
        $data['tags']           = $tags;
        $data['articletags']    = $articletags;

        return view('Views/admin/editwebbinar', $data);
    }

    // Diklat Views
    public function diklat()
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $DiklatModel        = new DiklatModel();

        // Get Data
        $user       = $usersmodel->find($this->data['uid']);
        $diklat     = $DiklatModel->orderBy('updated_at', 'DESC')->paginate(20, 'news');
        $users      = $usersmodel->findAll();
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
        $usersmodel         = new UsersModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $user               = $usersmodel->find($this->data['uid']);
        $tags               = $TagsModel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Seminar";
        $data['user']       = $user;
        $data['tags']       = $tags;

        return view('Views/admin/adddiklat', $data);
    }

    public function editdiklat($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        $articletags        = $ArticleTagsModel->where('articleid', $id)->where('category', '3')->find();
        $tags               = $TagsModel->findAll();
        $user               = $usersmodel->find($this->data['uid']);
        $diklat             = $DiklatModel->find($id);
        $photos             = $FotoDiklatModel->where('diklatid', $id)->find();
        $users              = $usersmodel->findAll();

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Edit Diklat";
        $data['user']           = $user;
        $data['users']          = $users;
        $data['photos']         = $photos;
        $data['news']           = $diklat;
        $data['tags']           = $tags;
        $data['articletags']    = $articletags;

        return view('Views/admin/editdiklat', $data);
    }

    public function removediklat($id)
    {
        // Calling Models
        $DiklatModel        = new DiklatModel();
        $FotoDiklatModel    = new FotoDiklatModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $diklat = $DiklatModel->find($id);
        $photos = $FotoDiklatModel->where('diklatid', $id)->where('category', '3')->find();

        // Delete Tags
        $ArticleTagsModel->where('articleid', $id)->delete();

        // unlink image
        if(!empty($diklat['images'])){
            unlink(FCPATH . $diklat['images']);
        }
        if(!empty($photos)){
            foreach ($photos as $photo) {
                unlink(FCPATH . $photo['file']);
            }
        }

        $photos->delete();
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
        $usersmodel         = new UsersModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $user               = $usersmodel->find($this->data['uid']);
        $tags               = $TagsModel->findAll();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Jadwal";
        $data['user']       = $user;
        $data['tags']       = $tags;

        return view('Views/admin/addjadwal', $data);
    }

    public function editjadwal($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $ScheduleModel      = new ScheduleModel();
        $TagsModel          = new TagsModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        $articletags        = $ArticleTagsModel->where('articleid', $id)->where('category', '4')->find();
        $tags               = $TagsModel->findAll();
        $user               = $usersmodel->find($this->data['uid']);
        $jadwal             = $ScheduleModel->find($id);
        $users              = $usersmodel->findAll();

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Edit Jadwal";
        $data['user']           = $user;
        $data['users']          = $users;
        $data['news']           = $jadwal;
        $data['tags']           = $tags;
        $data['articletags']    = $articletags;

        return view('Views/admin/editjadwal', $data);
    }

    public function removejadwal($id)
    {
        // Calling Models
        $ScheduleModel      = new ScheduleModel();
        $ArticleTagsModel   = new ArticleTagsModel();

        // Get Data
        $jadwal = $ScheduleModel->find($id);

        // Delete Tags
        $ArticleTagsModel->where('articleid', $id)->where('category', '4')->delete();

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

        // Unlink Photo Artista
        if(!empty($artista['photo'])){
            unlink(FCPATH ."/artista/foto/". $artista['photo']);
        }

        // // Unlink File Artista
        // if(!empty($artista['file'])){
        //     unlink(FCPATH ."/artista/foto/". $artista['file']);
        // }

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
        $usersmodel         = new UsersModel();
        $PhotoModel         = new PhotoModel();
        $FotoGaleriModel    = new FotoGaleriModel();

        // Get Data
        $user               = $usersmodel->find($this->data['uid']);
        $news               = $PhotoModel->find($id);
        $photos             = $FotoGaleriModel->where('photoid', $id)->find();

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Ubah Galeri Foto";
        $data['user']       = $user;
        $data['news']       = $news;
        $data['photos']     = $photos;

        return view('Views/admin/editfoto', $data);
    }

    public function removefoto($id)
    {
        // Calling Models
        $PhotoModel   = new PhotoModel();

        // Get Data
        $photo = $PhotoModel->find($id);

        // unlink foto
        if(!empty($photo['images'])){
            unlink(FCPATH . $photo['images']);
        }

        $PhotoModel->delete($photo);

        die(json_encode(array($photo)));
    }

    // Video Views
    public function video()
    {
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

        // Unlink Video
        if(!empty($video['images'])){
            unlink(FCPATH . $video['images']);
        }

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

    public function addslideshow()
    {
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

        // Unlink Slideshow
        if(!empty($slideshow['images'])){
            unlink(FCPATH . "/img/slideshow".$slideshow['images']);
        }

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
            'userid'    => $this->data['uid'],
        ];

        $PengaduanModel->save($status);

        die(json_encode(array($status)));
    }

    public function pengaduandelete($id)
    {
        // Calling Models
        $PengaduanModel = new PengaduanModel();

        // Delete Data
        $PengaduanModel->delete($id);
        
        return redirect()->back()->with('error', 'Data berhasil di hapus');
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
            'userid'    => $this->data['uid'],
        ];

        $PermohonanModel->save($status);

        die(json_encode(array($status)));
    }

    public function permohonandelete($id)
    {
        // Calling Models
        $PermohonanModel = new PermohonanModel();

        // Delete Data
        $PermohonanModel->delete($id);
        
        return redirect()->back()->with('error', 'Data berhasil di hapus');
    }

    // Gratifikasi
    public function laporgratifikasi($id)
    {
        // Calling Models
        $GratifikasiModel    = new GratifikasiModel();

        // Get Data
        $aduan = $GratifikasiModel->find($id);

        $status = [
            'id'        => $aduan['id'],
            'status'    => "1",
            'userid'    => $this->data['uid'],
        ];

        $GratifikasiModel->save($status);

        die(json_encode(array($status)));
    }

    public function gratifikasidelete($id)
    {
        // Calling Models
        $GratifikasiModel = new GratifikasiModel();

        // Delete Data
        $GratifikasiModel->delete($id);
        
        return redirect()->back()->with('error', 'Data berhasil di hapus');
    }
    
    // Maklumat
    public function maklumat()
    {
        // Calling Models
        $MaklumatModel          = new MaklumatModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $maklumat               = $MaklumatModel->first();

        $data                   = $this->data;
        $data['title']          = "Dashboard Maklumat Pelayanan";
        $data['maklumat']       = $maklumat;
        $data['user']           = $user;

        return view('Views/admin/maklumat', $data);
    }

    // Profile
    public function profile()
    {
        // Calling Models
        $PagesModel             = new PagesModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $profiles               = $PagesModel->where('name', 'Profile')->first();

        $data                   = $this->data;
        $data['title']          = "Dashboard Profil";
        $data['profiles']       = $profiles;
        $data['user']           = $user;

        return view('Views/admin/profile', $data);
    }

    // PPID
    public function ppid()
    {
        // Calling Models
        $PagesModel             = new PagesModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $ppids                  = $PagesModel->where('name', 'PPID')->first();

        $data                   = $this->data;
        $data['title']          = "Dashboard PPID";
        $data['ppids']          = $ppids;
        $data['user']           = $user;

        return view('Views/admin/ppid', $data);
    }

    // Survey
    public function survey()
    {
        // Calling Models
        $SurveyModel            = new SurveyModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $survey                 = $SurveyModel->first();

        $data                   = $this->data;
        $data['title']          = "Dashboard Hasil Survey";
        $data['survey']         = $survey;
        $data['user']           = $user;

        return view('Views/admin/survey', $data);
    }

    // Standar Pelayanan
    public function standarpelayanan()
    {
        // Calling Models
        $StandarPelayananModel  = new StandarPelayananModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $sp                     = $StandarPelayananModel->first();

        $data                   = $this->data;
        $data['title']          = "Dashboard Hasil Standar Pelayanan";
        $data['sp']             = $sp;
        $data['user']           = $user;

        return view('Views/admin/standarpelayanan', $data);
    }

    // RBI
    public function rbi()
    {
        // Calling Models
        $RbiModel               = new RbiModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $parents                = $RbiModel->where('parentid', 0)->orderBy('ordering', 'ASC')->paginate(20, 'rbi');
        $rbidata                = [];
        
        if (!empty($parents)) {
            foreach ($parents as $parent) {
                $rbidata[$parent['id']]        = [
                    'id'        => $parent['id'],
                    'title'     => $parent['title'],
                    'alias'     => $parent['alias'],
                    'content'   => $parent['content'],
                    'ordering'  => $parent['ordering'],
                ];
                $subparents     = $RbiModel->where('parentid', $parent['id'])->orderBy('ordering', 'ASC')->find();

                if (!empty($subparents)) {
                    foreach ($subparents as $subparent) {
                        $rbidata[$parent['id']]['subparent'][$subparent['id']]    = [
                            'id'        => $subparent['id'],
                            'parentid'  => $subparent['parentid'],
                            'title'     => $subparent['title'],
                            'alias'     => $subparent['alias'],
                            'content'   => $subparent['content'],
                            'ordering'  => $subparent['ordering'],
                        ];
                        $childs = $RbiModel->where('parentid', $subparent['id'])->orderBy('ordering', 'ASC')->find();

                        if (!empty($childs)) {
                            foreach ($childs as $child) {
                                $rbidata[$parent['id']]['subparent'][$subparent['id']]['child'][$child['id']]    = [
                                    'id'        => $child['id'],
                                    'parentid'  => $child['parentid'],
                                    'title'     => $child['title'],
                                    'alias'     => $child['alias'],
                                    'content'   => $child['content'],
                                    'ordering'  => $child['ordering'],
                                ];
                            }
                        } else {
                            $rbidata[$parent['id']]['subparent'][$subparent['id']]['child'] = [];
                        }
                    }
                } else {
                    $childs = [];
                    $rbidata[$parent['id']]['subparent'] = [];
                }
            }
        } else {
            $subparents     = [];
            $childs         = [];
        }
        
        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = "Dashboard RBI";
        $data['parents']        = $parents;
        $data['rbidata']        = $rbidata;
        $data['user']           = $user;
        $data['count']          = count($parents);
        $data['pager']          = $RbiModel->pager;
        
        return view('Views/admin/rbi', $data);
    }

    public function addrbi()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $RbiModel       = new RbiModel();

        // Get Data
        $user           = $usersmodel->find($this->data['uid']);
        $parents        = $RbiModel->where('parentid', 0)->find();
        $parentid       = [];

        foreach ($parents as $parent) {
            $parentid[] = $parent['id'];
        }

        if (!empty($parents)) {
            $subparents = $RbiModel->whereIn('parentid', $parentid)->find();
        } else {
            $subparents = [];
        }

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Tambah RBI";
        $data['description']    = 'Preview';
        $data['user']           = $user;
        $data['parents']        = $parents;
        $data['subparents']     = $subparents;

        return view('Views/admin/addrbi', $data);
    }

    public function editrbi($id)
    {
        // Calling Models
        $RbiModel           = new RbiModel();
        $usersmodel         = new UsersModel();

        $news               = $RbiModel->find($id);
        $user               = $usersmodel->find($this->data['uid']);
        $parents            = $RbiModel->where('parentid', 0)->find();
        $parentid           = [];

        foreach ($parents as $parent) {
            $parentid[] = $parent['id'];
        }

        $subparents = $RbiModel->whereIn('parentid', $parentid)->find();
        array_multisort($news, SORT_DESC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit RBI";
        $data['user']       = $user;
        $data['news']       = $news;
        $data['parents']    = $parents;
        $data['subparents'] = $subparents;

        return view('Views/admin/editrbi', $data);
    }

    public function removerbi()
    {
        // Calling Models
        $RbiModel       = new RbiModel();

        // Get Data
        $input          = $this->request->getPOST();
        $parent         = $RbiModel->find($input['id']);
        $subparent      = $RbiModel->where('parentid', $input['id'])->find();
        if (!empty($subparent)) {
            foreach ($subparent as $sub) {
                $child      = $RbiModel->where('parentid', $sub['id'])->find();

                // Remove Child
                if (!empty($child)) {
                    foreach ($child as $rbichild) {
                        $RbiModel->delete($rbichild['id']);
                    }
                }

                // Remove SubParent
                $RbiModel->delete($sub['id']);
            }
        }

        // Remove Parent
        $RbiModel->delete($parent['id']);

        // Return
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Other Menu
    public function othermenu()
    {
        // Calling Models
        $OtherMenuModel         = new OtherMenuModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $othermenus             = $OtherMenuModel->orderBy('ordering', 'ASC')->paginate(20, 'othermenu');
        
        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = "Dashboard Menu Lainnya";
        $data['othermenus']     = $othermenus;
        $data['user']           = $user;
        $data['count']          = count($othermenus);
        $data['pager']          = $OtherMenuModel->pager;
        
        return view('Views/admin/othermenu', $data);
    }

    public function addothermenu()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $OtherMenuModel = new OtherMenuModel();

        // Get Data
        $user           = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Tambah Menu Lainnya";
        $data['description']    = 'Preview';
        $data['user']           = $user;

        return view('Views/admin/addothermenu', $data);
    }

    public function editothermenu($id)
    {
        // Calling Models
        $OtherMenuModel     = new OtherMenuModel();
        $usersmodel         = new UsersModel();

        $othermenus         = $OtherMenuModel->find($id);
        $user               = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Menu ".$othermenus['title'];
        $data['user']       = $user;
        $data['othermenus'] = $othermenus;

        return view('Views/admin/editothermenu', $data);
    }

    public function removeothermenu()
    {
        // Calling Models
        $OtherMenuModel     = new OtherMenuModel();

        // Get Data
        $input              = $this->request->getPOST();
        $othermenus         = $OtherMenuModel->find($input['id']);

        // Remove Parent
        $OtherMenuModel->delete($input['id']);

        // Return
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Kemitraan
    public function kemitraan()
    {
        // Calling Models
        $KemitraanModel         = new KemitraanModel();
        $usersmodel             = new UsersModel();

        // Get Data
        $user                   = $usersmodel->find($this->data['uid']);
        $kemitraans             = $KemitraanModel->orderBy('ordering', 'ASC')->paginate(20, 'othermenu');
        
        // Parsing Data to View
        $data                   = $this->data;
        $data['title']          = "Dashboard Menu Lainnya";
        $data['kemitraans']     = $kemitraans;
        $data['user']           = $user;
        $data['count']          = count($kemitraans);
        $data['pager']          = $KemitraanModel->pager;
        
        return view('Views/admin/kemitraan', $data);
    }

    public function addkemitraan()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $KemitraanModel = new KemitraanModel();

        // Get Data
        $user           = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data                   = $this->data;
        $data['title']          = "Dashboard Tambah Menu Lainnya";
        $data['description']    = 'Preview';
        $data['user']           = $user;

        return view('Views/admin/addkemitraan', $data);
    }

    public function editkemitraan($id)
    {
        // Calling Models
        $KemitraanModel     = new KemitraanModel();
        $usersmodel         = new UsersModel();

        $kemitraans         = $KemitraanModel->find($id);
        $user               = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Menu ".$kemitraans['title'];
        $data['user']       = $user;
        $data['kemitraans'] = $kemitraans;

        return view('Views/admin/editkemitraan', $data);
    }

    public function removekemitraan()
    {
        // Calling Models
        $KemitraanModel     = new KemitraanModel();

        // Get Data
        $input              = $this->request->getPOST();
        $kemitraans         = $KemitraanModel->find($input['id']);

        // Remove Parent
        $KemitraanModel->delete($input['id']);

        // Return
        die(json_encode(array('errors', 'Data berhasil di hapus')));
    }

    // Gratifikasi Views
    public function gratifikasi()
    {
        // Calling Models
        $usersmodel     = new UsersModel();
        $FieldgratModel = new FieldgratModel();

        // Get Data
        $user           = $usersmodel->find($this->data['uid']);
        $fieldfrat      = $FieldgratModel->orderBy('id', 'ASC')->paginate(20, 'news');
        array_multisort($fieldfrat, SORT_ASC);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Seminar";
        $data['user']       = $user;
        $data['berita']     = $fieldfrat;
        $data['count']      = count($fieldfrat);
        $data['pager']      = $FieldgratModel->pager;

        return view('Views/admin/gratifikasi', $data);
    }

    public function addgratifikasi()
    {
        // Calling Models
        $usersmodel         = new UsersModel();

        // Get Data
        $user               = $usersmodel->find($this->data['uid']);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Tambah Gratifikasi";
        $data['user']       = $user;

        return view('Views/admin/addgratifikasi', $data);
    }

    public function editgratifikasi($id)
    {
        // Calling Models
        $usersmodel         = new UsersModel();
        $FieldgratModel     = new FieldgratModel();

        $user               = $usersmodel->find($this->data['uid']);
        $gratifikasi        = $FieldgratModel->find($id);

        // Parsing Data
        $data               = $this->data;
        $data['title']      = "Dashboard Edit Gratifikasi";
        $data['user']       = $user;
        $data['news']       = $gratifikasi;

        return view('Views/admin/editgratifikasi', $data);
    }

    public function removegratifikasi($id)
    {
        // Calling Models
        $FieldgratModel     = new FieldgratModel();

        // Get Data
        $gratifikasi        = $FieldgratModel->find($id);

        $FieldgratModel->delete($id);

        die(json_encode(array($gratifikasi)));
    }

    public function errors()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
    }

}
