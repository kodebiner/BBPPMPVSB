<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoDiklat extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'diklatid'          => ['type' => 'INT', 'constraint' => 11],
            'file'              => ['type' => 'VARCHAR', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('fotodiklat', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('fotodiklat');
    }
}