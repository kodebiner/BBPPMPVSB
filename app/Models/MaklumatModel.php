<?php namespace App\Models;

use CodeIgniter\Model;

class MaklumatModel extends Model
{
    protected $allowedFields = [
        'text',
    ];

    protected $table      = 'maklumat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}