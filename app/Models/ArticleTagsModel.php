<?php namespace App\Models;

use CodeIgniter\Model;

class ArticleTagsModel extends Model
{
    protected $allowedFields = [
        'tagsid', 'articleid', 'category',
    ];
    protected $table            = 'article_tags';
    protected $returnType       = 'array';

    public function findTag($article, $tag, $cat)
    {
        $Tag = $this->db->table('article_tags')->where('articleid', $article)->where('tagsid', $tag)->where('category', $cat)->get()->getResultArray();
        if (!empty($Tag)) {
            $tag = true;
        } else {
            $tag = false;
        }
        return $tag;
    }

    public function arrayTags($article, $cat)
    {
        $Tags = $this->db->table('article_tags')->where('articleid', $article)->where('category', $cat)->get()->getResultArray();
        return $Tags;
    }

    public function deleteTags($article, $tag, $cat)
    {
        $this->db->table('article_tags')->where('articleid', $article)->where('tagsid', $tag)->where('category', $cat)->delete();
        return true;
    }
}