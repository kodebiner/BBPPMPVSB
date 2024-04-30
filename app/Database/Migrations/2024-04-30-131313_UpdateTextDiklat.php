<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTextDiklat extends Migration
{
    public function up()
    {
        $fields = [
            'text'          => ['type' => 'MEDIUMTEXT'],
        ];
        $this->forge->addColumn('diklat', $fields);
    }
    
    public function down()
    {
        $fields = [
            'text',
        ];
        $this->forge->dropColumn('diklat', $fields);
    }
}