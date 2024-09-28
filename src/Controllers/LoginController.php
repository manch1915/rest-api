<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function login(): array
    {
        $username = $this->request()->input('username');
        $password = $this->request()->input('password');

        if ($this->auth()->attempt($username, $password)) {
            return $this->request()->responseJson([
                'success' => true,
                'message' => 'Пользователь успешно вошел в систему',
            ]);
        }

        return $this->request()->responseJson([
            'success' => false,
            'message' => 'Указан неверный адрес электронной почты или пароль',
        ]);
    }

    public function getLoggedUser(): array
    {
        return $this->request()->responseJson([
            'success' => true,
            'message' => [
                'id' => $this->auth()->id(),
                'username' => $this->auth()->user()->username(),
                'name' => $this->auth()->user()->name(),
            ],
        ]);
    }

    public function logout(): array
    {
        $this->auth()->logout();

        return $this->request()->responseJson([
            'success' => true,
            'message' => 'Пользователь успешно вышел из системы',
        ]);
    }
}
