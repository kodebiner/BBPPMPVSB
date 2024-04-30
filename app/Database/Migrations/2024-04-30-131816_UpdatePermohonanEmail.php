<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePermohonanEmail extends Migration
{
    public function up()
    {
        $fields = [
            'email'         => ['type' => 'VARCHAR', 'constraint' => 255],
        ];
        $this->forge->addColumn('permohonan', $fields);
    }
    
    public function down()
    {
        $fields = [
            'email',
        ];
        $this->forge->dropColumn('permohonan', $fields);
    }
}