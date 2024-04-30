<?php namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $allowedFields = [
        'file',
    ];

    protected $table      = 'survey';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
}