<?php namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $allowedFields = [
        'userid', 'group', 'created_at',
    ];

    protected $table      = 'auth_groups_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $createdField     = 'created_at';
}