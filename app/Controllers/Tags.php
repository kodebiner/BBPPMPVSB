<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\TagsModel;
use App\Models\ArticleTagsModel;
use App\Models\SeminarModel;
use App\Models\DiklatModel;
use App\Models\ScheduleModel;
use Tatter\Visits\Models\VisitModel;

class Tags extends BaseController
{
    protected $data;

    public function index()//: string
    {
        // Calling Services
        $pager      = \Config\Services::pager();

        // Calling Models
        $BeritaModel        = new BeritaModel();
        $SeminarModel       = new SeminarModel();
        $DiklatModel        = new DiklatModel();
        $ScheduleModel      = new ScheduleModel();
        $ArticleTagsModel   = new ArticleTagsModel();
        $TagsModel          = new TagsModel();

        // Search Engine
        // Populating Data
        $input              = $this->request->getGet('tag');
        $searchtag          = htmlspecialchars(strip_tags(htmlentities($input)), ENT_QUOTES);
        $tagsdata           = $TagsModel->like('title', $searchtag)->first();

        if (!empty($tagsdata)) {
            $articletagsnews    = $ArticleTagsModel->where('tagsid', $tagsdata['id'])->where('category', '1')->find();
            $tagnewsid          = [];
            foreach ($articletagsnews as $tagnews) {
                $tagnewsid[]    = $tagnews['articleid'];
            }
            $articletagssems    = $ArticleTagsModel->where('tagsid', $tagsdata['id'])->where('category', '2')->find();
            $tagsemsid          = [];
            foreach ($articletagssems as $tagsems) {
                $tagsemsid[]    = $tagsems['articleid'];
            }
            $articletagsdiks    = $ArticleTagsModel->where('tagsid', $tagsdata['id'])->where('category', '3')->find();
            $tagdiksid          = [];
            foreach ($articletagsdiks as $tagdiks) {
                $tagdiksid[]    = $tagdiks['articleid'];
            }
            $articletagsschd    = $ArticleTagsModel->where('tagsid', $tagsdata['id'])->where('category', '4')->find();
            $tagschdid          = [];
            foreach ($articletagsschd as $tagschd) {
                $tagschdid[]    = $tagschd['articleid'];
            }
            if (!empty($tagnewsid)) {
                $newses         = $BeritaModel->whereIn('id', $tagnewsid)->orderBy('updated_at', 'DESC')->where('status', 1)->limit(5)->find();
            } else {
                $newses         = [];
            }
            if (!empty($tagsemsid)) {
                $seminars       = $SeminarModel->whereIn('id', $tagsemsid)->orderBy('updated_at', 'DESC')->where('status', 1)->limit(5)->find();
            } else {
                $seminars       = [];
            }
            if (!empty($tagdiksid)) {
                $diklats        = $DiklatModel->whereIn('id', $tagdiksid)->orderBy('updated_at', 'DESC')->where('status', 1)->limit(5)->find();
            } else {
                $diklats        = [];
            }
            if (!empty($tagschdid)) {
                $schedules      = $ScheduleModel->whereIn('id', $tagschdid)->orderBy('updated_at', 'DESC')->where('status', 1)->limit(5)->find();
            } else {
                $schedules      = [];
            }
    
            $result = [];
            foreach ($newses as $news) {
                $result[] = [
                    'id'        => $news['id'],
                    'images'    => $news['images'],
                    'title'     => $news['title'],
                    'text'      => $news['description'],
                    'url'       => 'berita/'.$news['alias'],
                ];
            }
            foreach ($seminars as $seminar) {
                $result[] = [
                    'id'        => $seminar['id'],
                    'images'    => $seminar['images'],
                    'title'     => $seminar['title'],
                    'text'      => $seminar['description'],
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
                    'text'      => $jadwal['description'],
                    'url'       => 'jadwal-kegiatan/'.$jadwal['alias']
                ];
            }
    
            $page       = (int) ($this->request->getGet('page') ?? 1);
            $perPage    = 20;
            $total      = count($result);
    
            // Parsing Data To View
            $data                   = $this->data;
            $data['title']          = "Artikel Terkait ".$searchtag;
            $data['description']    = "Artikel Terkait ".$searchtag;
            $data['result']         = array_slice($result, ($page*20)-20, $page*20);
            $data['pager_links']    = $pager->makeLinks($page, $perPage, $total, 'uikit_full');
            $data['caturi']         = 'tag?tag='.$searchtag;
            $data['cattitle']       = $searchtag;
    
            // Return Data To View
            return view('tagsview', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
