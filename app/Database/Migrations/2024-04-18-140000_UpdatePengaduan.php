<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePengaduan extends Migration
{
    public function up()
    {
        $fields = [
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'id'],
        ];
        $this->forge->addColumn('pengaduan', $fields);
    }
    
    public function down()
    {
        $fields = [
            'name',
        ];
        $this->forge->dropColumn('pengaduan', $fields);
    }
}