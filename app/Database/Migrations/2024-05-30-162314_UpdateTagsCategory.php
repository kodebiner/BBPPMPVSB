<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTagsCategory extends Migration
{
    public function up()
    {
        $fields = [
            'category'            => ['type' => 'INT', 'constraint' => 11],
        ];
        $this->forge->addColumn('article_tags', $fields);
    }

    public function down()
    {
        $fields = [
            'category',
        ];
        $this->forge->dropColumn('article_tags', $fields);
    }
}