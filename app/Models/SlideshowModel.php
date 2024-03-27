<?php namespace App\Models;

use CodeIgniter\Model;

class SlideshowModel extends Model
{
    protected $allowedFields = [
        'file', 'status',
    ];

    protected $table      = 'slideshow';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}