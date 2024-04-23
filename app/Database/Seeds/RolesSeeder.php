<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'id' => generate_uuid(),
                'name' => 'Talent',
            ],
            [
                'id' => generate_uuid(),
                'name' => 'Recruiter',
            ],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
