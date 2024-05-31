<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateStatus extends Migration
{
    public function up()
    {
        $fields = [
            'status'            => ['type' => 'INT', 'constraint' => 11],
        ];
        $this->forge->addColumn('berita', $fields);
        $this->forge->addColumn('diklat', $fields);
        $this->forge->addColumn('seminar', $fields);
        $this->forge->addColumn('schedule', $fields);
        $this->forge->addColumn('photo', $fields);
        $this->forge->addColumn('video', $fields);
    }

    public function down()
    {
        $fields = [
            'status',
        ];
        $this->forge->dropColumn('berita', $fields);
        $this->forge->dropColumn('diklat', $fields);
        $this->forge->dropColumn('seminar', $fields);
        $this->forge->dropColumn('schedule', $fields);
        $this->forge->dropColumn('photo', $fields);
        $this->forge->dropColumn('video', $fields);
    }
}