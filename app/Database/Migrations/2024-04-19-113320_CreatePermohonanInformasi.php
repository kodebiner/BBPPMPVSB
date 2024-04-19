<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermohonanInformasi extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'address'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'jobs'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'note'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'        => ['type' => 'DATETIME'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('permohonan', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('permohonan');
    }
}