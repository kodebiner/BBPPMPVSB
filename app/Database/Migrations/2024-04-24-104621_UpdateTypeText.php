<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTypeText extends Migration
{
    public function up()
    {
        $fields = [
            'introtext' => [
                'type'          => 'MEDIUMTEXT',
            ],
            'fulltext' => [
                'type'          => 'MEDIUMTEXT',
            ],
        ];
        $this->forge->modifyColumn('berita', $fields);
        $this->forge->modifyColumn('seminar', $fields);
        $this->forge->modifyColumn('schedule', $fields);

        $note   = [
            'note' => [
                'type'          => 'MEDIUMTEXT',
            ],
        ];
        $this->forge->modifyColumn('pengaduan', $note);

        $address    = [
            'note' => [
                'type'          => 'MEDIUMTEXT',
            ],
            'address' => [
                'type'          => 'MEDIUMTEXT',
            ],
        ];
        $this->forge->modifyColumn('permohonan', $address);
    }

    public function down()
    {
        $fields = [
            'introtext' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'fulltext' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
        ];
        $this->forge->modifyColumn('berita', $fields);
        $this->forge->modifyColumn('seminar', $fields);
        $this->forge->modifyColumn('schedule', $fields);

        $note   = [
            'note' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
        ];
        $this->forge->modifyColumn('pengaduan', $note);

        $address    = [
            'note' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'address' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
        ];
        $this->forge->modifyColumn('permohonan', $address);
    }
}