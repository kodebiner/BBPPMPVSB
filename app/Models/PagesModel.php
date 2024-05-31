<?php namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $allowedFields = [
        'name', 'content',
    ];

    protected $table      = 'pages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}