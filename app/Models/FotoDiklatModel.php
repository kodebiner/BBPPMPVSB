<?php namespace App\Models;

use CodeIgniter\Model;

class FotoDiklatModel extends Model
{
    protected $allowedFields = [
        'diklatid', 'file',
    ];

    protected $table      = 'fotodiklat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}