<?php

namespace App\Models;

use CodeIgniter\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'job_title', 'description', 'user_id', 'created_at'];


    public function create($jobTitle, $description)
    {
        $id = generate_uuid();
        $data = [
            'id' => $id,
            'user_id' => session()->get('userData')['userId'],
            'job_title' => $jobTitle,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->insert($data);
        return $id;
    }
}
