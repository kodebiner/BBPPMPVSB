<?php namespace App\Models;

use CodeIgniter\Model;

class SeminarModel extends Model
{
    protected $allowedFields = [
        'userid', 'title', 'alias', 'type', 'introtext', 'fulltext', 'images', 'description', 'created_at', 'updated_at', 'deleted_at', 'status',
    ];

    protected $table      = 'seminar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}