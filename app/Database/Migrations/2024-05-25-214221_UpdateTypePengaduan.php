<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTypePengaduan extends Migration
{
    public function up()
    {
        $fields = [
            'type'            => ['type' => 'INT', 'constraint' => 11, 'after' => 'status'],
        ];
        $this->forge->addColumn('pengaduan', $fields);
    }

    public function down()
    {
        $fields = [
            'type',
        ];
        $this->forge->dropColumn('pengaduan', $fields);
    }
}