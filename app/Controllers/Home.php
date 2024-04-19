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

    public function index()//: string
    {
        // Calling Models
        $ContentModel   = new ContentModel();
        $SlideshowModel = new SlideshowModel();
        
        // Populating Data
        $newses     = $ContentModel->where('catid', '12')->orderBy('publish_up', 'DESC')->limit(4)->find();
        $workshops  = $ContentModel->where('catid', '20')->orWhere('catid', '13')->orderBy('publish_up', 'DESC')->limit(3)->find();
        $schedules  = $ContentModel->where('catid', '17')->orderBy('publish_up', 'DESC')->limit(6)->find();
        $diklats    = $ContentModel->where('catid', '14')->orderBy('publish_up', 'DESC')->limit(4)->find();
        $slideshows = $SlideshowModel->where('status', '1')->orderBy('id', 'DESC')->find();

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
}
