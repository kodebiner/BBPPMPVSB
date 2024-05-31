<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStandarPelayanan extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'file'              => ['type' => 'VARCHAR', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('standarpelayanan', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('standarpelayanan');
    }
}