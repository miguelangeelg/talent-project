<?php

namespace App\Controllers;

use App\Models\Roles;
use App\Models\User;

class UserController extends BaseController
{
    public function index(): string
    {
        $userData = session()->get('userData');
        $role = new Roles();
        $roleInfo = $role->getRoleById($userData['role']);

        $data = [
            'user' => [
                'username' => $userData['user_name']
            ],
            'role' => $roleInfo['name']
        ];

        return view('account/update', $data);
    }

    public function update()
    {
        $username = $this->request->getPost('user_name');
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('password');

        $rules = [
            'user_name' => 'required|min_length[5]|max_length[50]',
        ];

        $userData = session()->get('userData');
        $userModel = new User();

        $userNameExist = $userModel->where('user_name', $username)
        ->where('id !=', $userData['userId'])->first();

        
        if (!empty($userNameExist)) {
            $validation = \Config\Services::validation();
            $validation->setError('user_name', 'User name already exists');
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        if (!empty($this->request->getPost('password'))) {
            $rules['old_password'] = 'required';
            $rules['confirm_password'] = 'required|matches[password]';
            $rules['password'] = 'required|min_length[8]';

            $user = $userModel->find($userData['userId']);

            if (!password_verify($oldPassword . '', $user['password'])) {
                $validation = \Config\Services::validation();
                $validation->setError('old_password', 'Incorrect password');
                return redirect()->back()->withInput()->with('validation', $validation);
            }
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $user = new User();
        $user->updateUser($userData['userId'], $username, $newPassword);

        session()->set('userData', [
            'userId' => $userData['userId'],
            'user_name' => $username,
            'role' => $userData['role']
        ]);

        return redirect()->back();
    }
}
