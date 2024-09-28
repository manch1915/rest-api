<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class UserController extends Controller
{
    public function createUser(): array
    {
        $name = $this->request()->input('name');
        $username = $this->request()->input('username');
        $password = password_hash($this->request()->input('password'), PASSWORD_DEFAULT);

        // Insert user data into the database
        $userId = $this->db()->insert('users', [
            'name' => $name,
            'username' => $username,
            'password' => $password,
        ]);

        return $this->request()->responseJson([
            'success' => true,
            'userId' => $userId,
        ]);
    }

    public function updateUser(): array
    {
        $userId = $this->request()->input('id');
        $name = $this->request()->input('name');
        $username = $this->request()->input('username');

        $this->db()->update('users', [
            'name' => $name,
            'username' => $username,
        ], ['id' => $userId]);

        return $this->request()->responseJson([
            'success' => true,
        ]);
    }

    public function deleteUser(): array
    {
        $userId = $this->request()->input('id');

        $this->db()->delete('users', ['id' => $userId]);

        return $this->request()->responseJson([
            'success' => true,
        ]);
    }

    public function getUser(): array
    {
        $userId = $this->request()->input('id');

        $user = $this->db()->get('users', ['id' => $userId]);

        return $this->request()->responseJson([
            'success' => true,
            'user' => $user,
        ]);
    }
}