<?php namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $allowedFields = [
        'asset_id', 'title', 'alias', 'introtext', 'fulltext', 'state', 'catid', 'created', 'created_by', 'created_by_alias', 'modified', 'modified_by', 'checked_out', 'checked_out_time', 'publish_up', 'publish_down', 'images', 'urls', 'attribs', 'version', 'ordering', 'metakey', 'metadesc', 'access', 'hits', 'metadata', 'featured', 'language', 'note',
    ];

    protected $table      = 'josm8_content';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}