<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'job_title' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->createTable('jobs');
    }

    public function down()
    {
        $this->forge->dropTable('jobs');
    }
}
