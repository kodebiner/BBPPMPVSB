<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFieldgrat extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'alias'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'wajib'             => ['type' => 'INT', 'constraint' => 11,],
            'type'              => ['type' => 'INT', 'constraint' => 11,],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('fieldgrat', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('fieldgrat');
    }
}