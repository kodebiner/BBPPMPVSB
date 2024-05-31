<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticleTags extends Migration
{
    public function up()
    {
        $fields = [
            'tagsid'                => ['type' => 'INT', 'constraint' => 11],
            'articleid'             => ['type' => 'INT', 'constraint' => 11],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('article_tags', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('article_tags');
    }
}