<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoGallery extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'photoid'           => ['type' => 'INT', 'constraint' => 11],
            'file'              => ['type' => 'VARCHAR', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('fotogaleri', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('fotogaleri');
    }
}