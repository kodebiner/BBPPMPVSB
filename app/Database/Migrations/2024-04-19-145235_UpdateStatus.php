<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateStatus extends Migration
{
    public function up()
    {
        $fields = [
            'status'          => ['type' => 'INT', 'constraint' => 11, 'after' => 'note'],
        ];
        $this->forge->addColumn('pengaduan', $fields);
        $this->forge->addColumn('permohonan', $fields);
    }
    
    public function down()
    {
        $fields = [
            'status',
        ];
        $this->forge->dropColumn('pengaduan', $fields);
        $this->forge->dropColumn('permohonan', $fields);
    }
}