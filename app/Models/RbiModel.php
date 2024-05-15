<?php namespace App\Models;

use CodeIgniter\Model;

class RbiModel extends Model
{
    protected $allowedFields = [
        'parentid', 'title', 'alias', 'content', 'ordering',
    ];

    protected $table      = 'rbi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}