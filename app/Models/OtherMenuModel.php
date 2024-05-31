<?php namespace App\Models;

use CodeIgniter\Model;

class OtherMenuModel extends Model
{
    protected $allowedFields = [
        'title', 'alias', 'content', 'ordering',
    ];

    protected $table      = 'othermenu';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}