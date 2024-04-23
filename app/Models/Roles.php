<?php

namespace App\Models;

use CodeIgniter\Model;

class Roles extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'name'];

    public function getAllRoles()
    {
        return $this->findAll();
    }

    public function getRoleById($roleId)
    {
        return $this->find($roleId);
    }
}
