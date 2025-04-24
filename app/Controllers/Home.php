<?php

namespace App\Controllers;
use App\Models\ContentModel;
use App\Models\BeritaModel;
use App\Models\SeminarModel;
use App\Models\ScheduleModel;
use App\Models\PhotoModel;
use App\Models\DiklatModel;
use App\Models\VideoModel;
use App\Models\SlideshowModel;

class Home extends BaseController
{
    protected $data;

    public function info()
    {
        phpinfo();
    }

    public function index()//: string
    {
        // Calling Models
        $ContentModel   = new ContentModel();
        $SlideshowModel = new SlideshowModel();
        $BeritaModel    = new BeritaModel();
        $SeminarModel   = new SeminarModel();
        $ScheduleModel  = new ScheduleModel();
        $DiklatModel    = new DiklatModel();
        
        // Populating Data
        $newses         = $BeritaModel->orderBy('updated_at', 'DESC')->where('status', 1)->limit(4)->find();
        $workshops      = $SeminarModel->orderBy('updated_at', 'DESC')->where('status', 1)->limit(3)->find();
        $schedules      = $ScheduleModel->orderBy('updated_at', 'DESC')->where('status', 1)->find();
        $diklats        = $DiklatModel->orderBy('updated_at', 'DESC')->where('status', 1)->limit(4)->find();
        $slideshows     = $SlideshowModel->where('status', '1')->orderBy('id', 'DESC')->find();

        // Parsing Data To View
        $data                   = $this->data;
        $data['title']          = "BBPPMPV Seni dan Budaya";
        $data['description']    = "Selamat datang di website BBPPMPVSB";
        $data['newses']         = $newses;
        $data['workshops']      = $workshops;
        $data['schedules']      = $schedules;
        $data['diklats']        = $diklats;
        $data['slideshows']     = $slideshows;

        // Return To View
        return view('home', $data);
        // return view('welcome_message');
    }

    public function migration()
    {
        echo command('migrate --all');
    }

    public function movedata()
    {
        // Calling Models
        $ContentModel       = new ContentModel();
        $BeritaModel        = new BeritaModel();
        $SeminarModel       = new SeminarModel();
        $ScheduleModel      = new ScheduleModel();
        $PhotoModel         = new PhotoModel();
        $DiklatModel        = new DiklatModel();
        $VideoModel         = new VideoModel();
        
        // Populating Data
        $newses             = $ContentModel->where('catid', '12')->orWhere('catid', '14')->find();
        $seminars           = $ContentModel->where('catid', '20')->orWhere('catid', '13')->find();
        $schedules          = $ContentModel->where('catid', '17')->find();
        $photos             = $ContentModel->where('catid', '18')->find();
        $diklats            = $ContentModel->where('catid', '19')->find();
        $videos             = $ContentModel->where('catid', '16')->find();

        // Data Berita
        foreach ($newses as $news) {
            $images = json_decode($news['images']);
            $datanews = [
                'userid'        => $news['created_by'],
                'title'         => $news['title'],
                'alias'         => $news['alias'],
                'introtext'     => $news['introtext'],
                'fulltext'      => $news['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $news['metadesc'],
                'created_at'    => $news['created'],
                'updated_at'    => $news['modified'],
            ];

            // Insert Data
            $BeritaModel->insert($datanews);
        }
        // Data Berita End
        
        // Data Seminar
        foreach ($seminars as $seminar) {
            $images = json_decode($seminar['images']);
            $dataseminar = [
                'userid'        => $seminar['created_by'],
                'title'         => $seminar['title'],
                'alias'         => $seminar['alias'],
                'introtext'     => $seminar['introtext'],
                'fulltext'      => $seminar['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $seminar['metadesc'],
                'created_at'    => $seminar['created'],
                'updated_at'    => $seminar['modified'],
            ];

            // Insert Data
            $SeminarModel->insert($dataseminar);
        }
        // Data Seminar End
        
        // Data Schedule
        foreach ($schedules as $schedule) {
            $images = json_decode($schedule['images']);
            $dataschedule = [
                'userid'        => $schedule['created_by'],
                'title'         => $schedule['title'],
                'alias'         => $schedule['alias'],
                'introtext'     => $schedule['introtext'],
                'fulltext'      => $schedule['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $schedule['metadesc'],
                'created_at'    => $schedule['created'],
                'updated_at'    => $schedule['modified'],
            ];

            // Insert Data
            $ScheduleModel->insert($dataschedule);
        }
        // Data Schedule End
        
        // Data Photo
        foreach ($photos as $photo) {
            $images = json_decode($photo['images']);
            $dataphoto = [
                'title'         => $photo['title'],
                'images'        => $images->image_intro,
                'created_at'    => $photo['created'],
                'updated_at'    => $photo['modified'],
            ];

            // Insert Data
            $PhotoModel->insert($dataphoto);
        }
        // Data Photo End
        
        // Data Diklat
        foreach ($diklats as $diklat) {
            $images = json_decode($diklat['images']);
            $datadiklat = [
                'title'         => $diklat['title'],
                'images'        => $images->image_intro,
                'created_at'    => $diklat['created'],
                'updated_at'    => $diklat['modified'],
            ];

            // Insert Data
            $DiklatModel->insert($datadiklat);
        }
        // Data Diklat End
        
        // Data Video
        foreach ($videos as $video) {
            $images = json_decode($video['images']);
            $datavideo = [
                'title'         => $video['title'],
                'images'        => $images->image_intro,
                'created_at'    => $video['created'],
                'updated_at'    => $video['modified'],
            ];

            // Insert Data
            $VideoModel->insert($datavideo);
        }
        // Data Video End

        // Return
        return redirect()->back()->with('message', "Data Berhasil Dipindahkan");
    }

    public function reconfseminarwebinar()
    {
        // Calling Models
        $ContentModel       = new ContentModel();
        $SeminarModel       = new SeminarModel();

        // Populating Data
        $seminars           = $ContentModel->where('catid', '20')->find();
        $webinars           = $ContentModel->Where('catid', '13')->find();

        // Truncate Seminar
        $SeminarModel->truncate();
        // Truncate Seminar End
        
        // Data Seminar
        foreach ($seminars as $seminar) {
            $images = json_decode($seminar['images']);
            $dataseminar = [
                'userid'        => $seminar['created_by'],
                'title'         => $seminar['title'],
                'alias'         => $seminar['alias'],
                'introtext'     => $seminar['introtext'],
                'fulltext'      => $seminar['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $seminar['metadesc'],
                'created_at'    => $seminar['created'],
                'updated_at'    => $seminar['modified'],
                'type'          => 0,
            ];

            // Insert Data
            $SeminarModel->insert($dataseminar);
        }
        // Data Seminar End
        
        // Data Webinar
        foreach ($webinars as $webinar) {
            $images = json_decode($webinar['images']);
            $datawebinar = [
                'userid'        => $webinar['created_by'],
                'title'         => $webinar['title'],
                'alias'         => $webinar['alias'],
                'introtext'     => $webinar['introtext'],
                'fulltext'      => $webinar['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $webinar['metadesc'],
                'created_at'    => $webinar['created'],
                'updated_at'    => $webinar['modified'],
                'type'          => 1,
            ];

            // Insert Data
            $SeminarModel->insert($datawebinar);
        }
        // Data Webinar End
    }

    public function reconfdata()
    {
        // Calling Models
        $ContentModel       = new ContentModel();
        $BeritaModel        = new BeritaModel();
        $SeminarModel       = new SeminarModel();
        $ScheduleModel      = new ScheduleModel();
        $PhotoModel         = new PhotoModel();
        $DiklatModel        = new DiklatModel();
        $VideoModel         = new VideoModel();

        // Populating Data
        $newses             = $ContentModel->where('catid', '12')->orWhere('catid', '14')->find();
        $seminars           = $ContentModel->where('catid', '20')->find();
        $webinars           = $ContentModel->orWhere('catid', '13')->find();
        $schedules          = $ContentModel->where('catid', '17')->find();
        $photos             = $ContentModel->where('catid', '18')->find();
        $diklats            = $ContentModel->where('catid', '19')->find();
        $videos             = $ContentModel->where('catid', '16')->find();

        // Truncate Data
        $BeritaModel->truncate();
        $SeminarModel->truncate();
        $ScheduleModel->truncate();
        $PhotoModel->truncate();
        $DiklatModel->truncate();
        $VideoModel->truncate();
        // Truncate Data End

        // Data Berita
        foreach ($newses as $news) {
            $images = json_decode($news['images']);
            $datanews = [
                'userid'        => $news['created_by'],
                'title'         => $news['title'],
                'alias'         => $news['alias'],
                'introtext'     => $news['introtext'],
                'fulltext'      => $news['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $news['metadesc'],
                'created_at'    => $news['created'],
                'updated_at'    => $news['modified'],
            ];

            // Insert Data
            $BeritaModel->insert($datanews);
        }
        // Data Berita End
        
        // Data Seminar
        foreach ($seminars as $seminar) {
            $images = json_decode($seminar['images']);
            $dataseminar = [
                'userid'        => $seminar['created_by'],
                'title'         => $seminar['title'],
                'alias'         => $seminar['alias'],
                'introtext'     => $seminar['introtext'],
                'fulltext'      => $seminar['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $seminar['metadesc'],
                'created_at'    => $seminar['created'],
                'updated_at'    => $seminar['modified'],
                'type'          => 0,
            ];

            // Insert Data
            $SeminarModel->insert($dataseminar);
        }
        // Data Seminar End
        
        // Data Webinar
        foreach ($webinars as $webinar) {
            $images = json_decode($webinar['images']);
            $datawebinar = [
                'userid'        => $webinar['created_by'],
                'title'         => $webinar['title'],
                'alias'         => $webinar['alias'],
                'introtext'     => $webinar['introtext'],
                'fulltext'      => $webinar['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $webinar['metadesc'],
                'created_at'    => $webinar['created'],
                'updated_at'    => $webinar['modified'],
                'type'          => 1,
            ];

            // Insert Data
            $SeminarModel->insert($datawebinar);
        }
        // Data Webinar End
        
        // Data Schedule
        foreach ($schedules as $schedule) {
            $images = json_decode($schedule['images']);
            $dataschedule = [
                'userid'        => $schedule['created_by'],
                'title'         => $schedule['title'],
                'alias'         => $schedule['alias'],
                'introtext'     => $schedule['introtext'],
                'fulltext'      => $schedule['fulltext'],
                'images'        => $images->image_intro,
                'description'   => $schedule['metadesc'],
                'created_at'    => $schedule['created'],
                'updated_at'    => $schedule['modified'],
            ];

            // Insert Data
            $ScheduleModel->insert($dataschedule);
        }
        // Data Schedule End
        
        // Data Photo
        foreach ($photos as $photo) {
            $images = json_decode($photo['images']);
            $dataphoto = [
                'title'         => $photo['title'],
                'images'        => $images->image_intro,
                'created_at'    => $photo['created'],
                'updated_at'    => $photo['modified'],
            ];

            // Insert Data
            $PhotoModel->insert($dataphoto);
        }
        // Data Photo End
        
        // Data Diklat
        foreach ($diklats as $diklat) {
            $images = json_decode($diklat['images']);
            $datadiklat = [
                'title'         => $diklat['title'],
                'images'        => $images->image_intro,
                'created_at'    => $diklat['created'],
                'updated_at'    => $diklat['modified'],
            ];

            // Insert Data
            $DiklatModel->insert($datadiklat);
        }
        // Data Diklat End
        
        // Data Video
        foreach ($videos as $video) {
            $images = json_decode($video['images']);
            $datavideo = [
                'title'         => $video['title'],
                'images'        => $images->image_intro,
                'created_at'    => $video['created'],
                'updated_at'    => $video['modified'],
            ];

            // Insert Data
            $VideoModel->insert($datavideo);
        }
        // Data Video End
    }

    public function changestatus()
    {
        // Calling Models
        $BeritaModel        = new BeritaModel();
        $SeminarModel       = new SeminarModel();
        $ScheduleModel      = new ScheduleModel();
        $PhotoModel         = new PhotoModel();
        $DiklatModel        = new DiklatModel();
        $VideoModel         = new VideoModel();

        // Populating Data
        $newses             = $BeritaModel->findAll();
        $seminars           = $SeminarModel->findAll();
        $schedules          = $ScheduleModel->findAll();
        $photos             = $PhotoModel->findAll();
        $diklats            = $DiklatModel->findAll();
        $videos             = $VideoModel->findAll();

        // Data Berita
        foreach ($newses as $news) {
            $datanews = [
                'id'        => $news['id'],
                'status'    => 1,
            ];

            // Insert Data
            $BeritaModel->save($datanews);
        }
        // Data Berita End
        
        // Data Seminar
        foreach ($seminars as $seminar) {
            $dataseminar = [
                'id'        => $seminar['id'],
                'status'    => 1,
            ];

            // Insert Data
            $SeminarModel->save($dataseminar);
        }
        // Data Seminar End
        
        // Data Schedule
        foreach ($schedules as $schedule) {
            $dataschedule = [
                'id'        => $schedule['id'],
                'status'    => 1,
            ];

            // Insert Data
            $ScheduleModel->save($dataschedule);
        }
        // Data Schedule End
        
        // Data Photo
        foreach ($photos as $photo) {
            $dataphoto = [
                'id'        => $photo['id'],
                'status'    => 1,
            ];

            // Insert Data
            $PhotoModel->save($dataphoto);
        }
        // Data Photo End
        
        // Data Diklat
        foreach ($diklats as $diklat) {
            $datadiklat = [
                'id'        => $diklat['id'],
                'status'    => 1,
            ];

            // Insert Data
            $DiklatModel->save($datadiklat);
        }
        // Data Diklat End
        
        // Data Video
        foreach ($videos as $video) {
            $datavideo = [
                'id'        => $video['id'],
                'status'    => 1,
            ];

            // Insert Data
            $VideoModel->save($datavideo);
        }
        // Data Video End
    }
}
