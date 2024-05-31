<?php namespace App\Models;

use CodeIgniter\Model;

class GratifikasiModel extends Model
{
    protected $allowedFields = [
        'content', 'userid', 'status', 'created_at',
    ];

    protected $table            = 'gratifikasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
}