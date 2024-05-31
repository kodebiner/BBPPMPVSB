<?php namespace App\Models;

use CodeIgniter\Model;

class StandarPelayananModel extends Model
{
    protected $allowedFields = [
        'file',
    ];

    protected $table      = 'standarpelayanan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}