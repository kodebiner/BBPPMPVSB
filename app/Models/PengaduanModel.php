<?php namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $allowedFields = [
        'userid', 'name', 'email', 'phone', 'note', 'status', 'type', 'created_at',
    ];

    protected $table      = 'pengaduan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}