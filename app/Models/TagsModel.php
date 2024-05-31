<?php namespace App\Models;

use CodeIgniter\Model;

class TagsModel extends Model
{
    protected $allowedFields = [
        'title',
    ];

    protected $table      = 'tags';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}