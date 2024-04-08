<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateArtista extends Migration
{
    public function up()
    {
        $fields = [
            'title'         => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'id'],
            'alias'         => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'title'],
        ];
        $this->forge->addColumn('artista', $fields);
    }
    
    public function down()
    {
        $fields = [
            'title',
            'alias',
        ];
        $this->forge->dropColumn('artista', $fields);
    }
}