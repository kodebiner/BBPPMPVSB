<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGratifikasi extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userid'            => ['type' => 'INT', 'constraint' => 11],
            'content'           => ['type' => 'TEXT'],
            'status'            => ['type' => 'INT', 'constraint' => 11],
            'created_at'        => ['type' => 'DATETIME'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gratifikasi', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('gratifikasi');
    }
}