<?php namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $allowedFields = [
        'userid', 'name', 'email', 'phone', 'address', 'jobs', 'note', 'status', 'created_at',
    ];

    protected $table      = 'permohonan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}