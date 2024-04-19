<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeminar extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userid'            => ['type' => 'INT', 'constraint' => 11],
            'title'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'alias'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'introtext'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'fulltext'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'images'            => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'DATETIME'],
            'deleted_at'        => ['type' => 'DATETIME'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('seminar', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('seminar');
    }
}