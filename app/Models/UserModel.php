<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $allowedFields = [
        'name', 'username', 'email', 'password', 'block', 'sendEmail', 'registerDate', 'lastvisitDate', 'activation', 'params', 'lastResetTime', 'resetCount', 'otpKey', 'otep', 'requireReset', 'authProvider',
    ];

    protected $table      = 'josm8_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}