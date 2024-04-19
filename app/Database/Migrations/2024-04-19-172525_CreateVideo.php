<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVideo extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'images'            => ['type' => 'VARCHAR', 'constraint' => 255],
            'link'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'DATETIME'],
            'deleted_at'        => ['type' => 'DATETIME'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('video', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('video');
    }
}