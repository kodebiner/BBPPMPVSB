<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $allowedFields = [
        'username', 'status', 'status_message', 'active', 'last_active', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}