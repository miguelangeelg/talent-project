<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Roles;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $userData = session()->get('userData');
        $jobModel = new Job();
        $role = new Roles();
        $roleInfo = $role->getRoleById($userData['role']);

        if ($roleInfo['name'] == 'Recruiter') {
            $jobs = $jobModel->where('user_id', $userData['userId'])
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $jobs = $jobModel->orderBy('created_at', 'DESC')->findAll();
        }

        $data = [
            'jobs' => $jobs,
            'userData' => $userData,
            'role' => $roleInfo['name']
        ];

        return view('dashboard/index', $data);
    }
}
