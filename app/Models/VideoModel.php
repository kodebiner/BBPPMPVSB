<?php namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $allowedFields = [
        'title', 'images', 'link', 'created_at', 'updated_at', 'deleted_at', 'status',
    ];

    protected $table      = 'video';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}