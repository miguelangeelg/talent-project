<?php

namespace App\Controllers;

use App\Models\Roles;
use App\Models\User;

class AuthController extends BaseController
{
    public function register(): string
    {
        $rolesModel = new Roles();
        $roles = $rolesModel->getAllRoles();
        $data['roles'] = $roles;
        return view('auth/register', $data);
    }

    public function login()
    {
        return view('auth/login');  
    }

    public function loginAction()
    {
        $username = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');

        $user = new User();
        $userNameExist = $user->where('user_name', $username)->first();

        if (empty($userNameExist) || !password_verify($password . '', $userNameExist['password'])) {
            $validation = \Config\Services::validation();
            $validation->setError('general', 'User name or password incorrect');
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        session()->set('userData', [
            'userId' => $userNameExist['id'],
            'user_name' => $username,
            'role' => $userNameExist['role']
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function store()
    {
        $username = $this->request->getPost('user_name');
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');

        $rules = [
            'user_name' => 'required|min_length[5]|max_length[50]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];

        $user = new User();
        $userNameExist = $user->where('user_name', $username)->first();

        if (!empty($userNameExist)) {
            $validation = \Config\Services::validation();
            $validation->setError('user_name', 'User name already exists');
            return redirect()->back()->withInput()->with('validation', $validation);
        }


        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userId = $user->create($username, $password, $role);

        session()->set('userData', [
            'userId' => $userId,
            'user_name' => $username,
            'role' => $role
        ]);

        return redirect()->to('/dashboard');
    }
}
