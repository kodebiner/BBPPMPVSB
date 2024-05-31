<?php namespace App\Models;

use CodeIgniter\Model;

class KemitraanModel extends Model
{
    protected $allowedFields = [
        'title', 'alias', 'content', 'ordering',
    ];

    protected $table      = 'kemitraan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}