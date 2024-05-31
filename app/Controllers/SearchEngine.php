<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\ArtistaModel;
use App\Models\TagsModel;
use App\Models\ArticleTagsModel;
use App\Models\SeminarModel;
use App\Models\DiklatModel;
use App\Models\ScheduleModel;
use App\Models\PhotoModel;
use App\Models\VideoModel;
use App\Models\RbiModel;
use App\Models\OtherMenuModel;
use App\Models\KemitraanModel;
use App\Models\PagesModel;
use Tatter\Visits\Models\VisitModel;

class SearchEngine extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $ArtistaModel       = new ArtistaModel();
        $BeritaModel        = new BeritaModel();
        $SeminarModel       = new SeminarModel();
        $DiklatModel        = new DiklatModel();
        $ScheduleModel      = new ScheduleModel();
        $PhotoModel         = new PhotoModel();
        $VideoModel         = new VideoModel();
        $RbiModel           = new RbiModel();
        $OtherMenuModel     = new OtherMenuModel();
        $KemitraanModel     = new KemitraanModel();
        // $PagesModel         = new PagesModel();

        // Search Engine
        // Populating Data
        $input              = $this->request->getGet();

        $newses         = $BeritaModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->orLike('introtext', $input['search'])->orLike('fulltext', $input['search'])->find();
        $seminars       = $SeminarModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->orLike('introtext', $input['search'])->orLike('fulltext', $input['search'])->find();
        $diklats        = $DiklatModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->orLike('text', $input['search'])->find();
        $schedules      = $ScheduleModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->orLike('introtext', $input['search'])->orLike('fulltext', $input['search'])->find();
        $photos         = $PhotoModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->find();
        $videos         = $VideoModel->orderBy('updated_at', 'DESC')->where('status', 1)->like('title', $input['search'])->find();
        $rbis           = $RbiModel->orderBy('ordering', 'ASC')->like('title', $input['search'])->orLike('content', $input['search'])->find();
        $othermenus     = $OtherMenuModel->orderBy('ordering', 'ASC')->like('title', $input['search'])->orLike('content', $input['search'])->find();
        $kemitraans     = $KemitraanModel->orderBy('ordering', 'ASC')->like('title', $input['search'])->orLike('content', $input['search'])->find();
        // $pages          = $PagesModel->like('name', $input['search'])->find();
        $artistas       = $ArtistaModel->orderBy('id', 'DESC')->like('title', $input['search'])->find();

        $result = [];
        foreach ($newses as $news) {
            $result[] = [
                'id'        => $news['id'],
                'images'    => $news['images'],
                'title'     => $news['title'],
                'text'      => $news['introtext'],
                'url'       => 'berita/'.$news['alias'],
            ];
        }
        foreach ($seminars as $seminar) {
            $result[] = [
                'id'        => $seminar['id'],
                'images'    => $seminar['images'],
                'title'     => $seminar['title'],
                'text'      => $seminar['introtext'],
                'url'       => 'informasi/seminarwebinar/'.$seminar['alias']
            ];
        }
        foreach ($diklats as $diklat) {
            $result[] = [
                'id'        => $diklat['id'],
                'images'    => $diklat['images'],
                'title'     => $diklat['title'],
                'text'      => '',
                'url'       => 'informasi/diklat/'.$diklat['id']
            ];
        }
        foreach ($schedules as $jadwal) {
            $result[] = [
                'id'        => $jadwal['id'],
                'images'    => $jadwal['images'],
                'title'     => $jadwal['title'],
                'text'      => $jadwal['introtext'],
                'url'       => 'jadwal-kegiatan/'.$jadwal['alias']
            ];
        }
        foreach ($photos as $photo) {
            $result[] = [
                'id'        => $photo['id'],
                'images'    => $photo['images'],
                'title'     => $photo['title'],
                'text'      => '',
                'url'       => 'galeri/foto/'.$photo['id']
            ];
        }
        foreach ($videos as $video) {
            $result[] = [
                'id'        => $video['id'],
                'images'    => $video['images'],
                'title'     => $video['title'],
                'text'      => '',
                'url'       => 'galeri/video/'.$video['id']
            ];
        }
        foreach ($rbis as $rbi) {
            $result[] = [
                'id'        => $rbi['id'],
                'images'    => '',
                'title'     => $rbi['title'],
                'text'      => '',
                'url'       => 'rbi/'.$rbi['alias']
            ];
        }
        foreach ($othermenus as $othermenu) {
            $result[] = [
                'id'        => $othermenu['id'],
                'images'    => '',
                'title'     => $othermenu['title'],
                'text'      => '',
                'url'       => 'othermenu/'.$othermenu['alias']
            ];
        }
        foreach ($kemitraans as $kemitraan) {
            $result[] = [
                'id'        => $kemitraan['id'],
                'images'    => '',
                'title'     => $kemitraan['title'],
                'text'      => '',
                'url'       => 'kemitraan/'.$kemitraan['alias']
            ];
        }
        foreach ($artistas as $artista) {
            $result[] = [
                'id'        => $artista['id'],
                'images'    => 'artista/foto/'.$artista['photo'],
                'title'     => $artista['title'],
                'text'      => '',
                'url'       => 'publikasi/artista/'.$artista['alias']
            ];
        }

        $page       = (int) ($this->request->getGet('page') ?? 1);
        $perPage    = 20;
        $total      = count($result);

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "Hasil Pencarian Terkait ".$input['search'];
        $data['description']    = "Hasil Pencarian Terkait ".$input['search'];
        $data['result']         = array_slice($result, ($page*20)-20, $page*20);
        $data['pager_links']    = $pager->makeLinks($page, $perPage, $total, 'uikit_full');
        $data['caturi']         = '?search='.$input['search'];
        $data['cattitle']       = $input['search'];

        // Return Data To View
        return view('searchview', $data);
    }
}
