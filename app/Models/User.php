<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'user_name', 'role', 'password', 'created_at'];


    public function create($userName, $password, $role)
    {

        $id = generate_uuid();
        $data = [
            'id' => $id,
            'user_name' => $userName,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->insert($data);

        return $id;
    }

    public function updateUser($userId, $userName, $password)
    {
        $data = [
            'user_name' => $userName,
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        return $this->update($userId, $data);
    }
}
