<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $allowedFields = [
        'asset_id', 'parent_id', 'lft', 'rgt', 'level', 'path', 'extention', 'title', 'alias', 'note', 'description', 'published', 'checked_out', 'checked_out_time', 'access', 'params', 'metadesc', 'metakey', 'metadata', 'created_user_id', 'created_time', 'modified_user_id', 'modified_time', 'hits', 'language', 'version',
    ];

    protected $table      = 'josm8_categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}