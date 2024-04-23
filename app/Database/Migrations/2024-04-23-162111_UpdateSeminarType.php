<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateSeminarType extends Migration
{
    public function up()
    {
        $fields = [
            'type'          => ['type' => 'INT', 'constraint' => 11, 'after' => 'alias'],
        ];
        $this->forge->addColumn('seminar', $fields);
    }
    
    public function down()
    {
        $fields = [
            'type',
        ];
        $this->forge->dropColumn('seminar', $fields);
    }
}