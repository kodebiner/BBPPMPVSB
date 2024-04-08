<?php namespace App\Models;

use CodeIgniter\Model;

class ArtistaModel extends Model
{
    protected $allowedFields = [
        'file', 'photo',
    ];

    protected $table      = 'artista';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}