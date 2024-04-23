<?php

namespace App\Controllers;

use App\Models\Job as ModelsJob;
use App\Models\Roles;

class JobController extends BaseController
{
    public function index(): string
    {
        $userData = session()->get('userData');
        $role = new Roles();

        $roleInfo = $role->getRoleById($userData['role']);

        $data = [
            'userData' => $userData,
            'role' => $roleInfo['name']
        ];
        return view('jobs/create', $data);
    }

    public function store()
    {
        $jobTitle = $this->request->getPost('job_title');
        $jobDescription = $this->request->getPost('job_description');

        $rules = [
            'job_title' => 'required|min_length[6]|max_length[50]',
            'job_description' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $jobModel = new ModelsJob();
        $jobModel->create($jobTitle, $jobDescription);

        return redirect()->to('/dashboard');
    }

}
