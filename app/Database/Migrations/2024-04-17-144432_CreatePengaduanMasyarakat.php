<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaduanMasyarakat extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'note'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'        => ['type' => 'DATETIME'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaduan', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('pengaduan');
    }
}