<?php namespace App\Models;

use CodeIgniter\Model;

class DiklatModel extends Model
{
    protected $allowedFields = [
        'title', 'images', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $table      = 'diklat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}