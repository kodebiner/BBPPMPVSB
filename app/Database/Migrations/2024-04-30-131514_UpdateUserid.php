<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserid extends Migration
{
    public function up()
    {
        $fields = [
            'userid'          => ['type' => 'INT', 'constraint' => 11],
        ];
        $this->forge->addColumn('permohonan', $fields);
        $this->forge->addColumn('pengaduan', $fields);
    }
    
    public function down()
    {
        $fields = [
            'userid',
        ];
        $this->forge->dropColumn('permohonan', $fields);
        $this->forge->dropColumn('pengaduan', $fields);
    }
}