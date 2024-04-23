<?php namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model
{
    protected $allowedFields = [
        'user_id', 'name', 'secret', 'secret2', 'force_reset', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $table      = 'auth_identities';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}