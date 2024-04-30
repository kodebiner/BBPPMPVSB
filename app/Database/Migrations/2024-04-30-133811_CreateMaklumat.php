<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMaklumat extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'text'              => ['type' => 'MEDIUMTEXT'],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('maklumat', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('maklumat');
    }
}