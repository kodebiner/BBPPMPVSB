<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKemitraan extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'alias'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'content'           => ['type' => 'MEDIUMTEXT'],
            'ordering'          => ['type' => 'INT', 'constraint' => 11,],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kemitraan', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('kemitraan');
    }
}