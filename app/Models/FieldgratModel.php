<?php namespace App\Models;

use CodeIgniter\Model;

class FieldgratModel extends Model
{
    protected $allowedFields = [
        'name', 'alias', 'wajib', 'type',
    ];

    protected $table      = 'fieldgrat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}