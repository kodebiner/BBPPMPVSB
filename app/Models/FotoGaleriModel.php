<?php namespace App\Models;

use CodeIgniter\Model;

class FotoGaleriModel extends Model
{
    protected $allowedFields = [
        'photoid', 'file',
    ];

    protected $table      = 'fotogaleri';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}