<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Account;
use App\Models\User;
use App\Models\Cart;
use PDOException;

class RegisterController extends BaseController
{
    public function showRegisterForm()
    {
        return $this->sendPage('auth/Register', ['error' => false]);
    }
    
    public function register()
    {
        $credentials = $this->getCredentials();

        try {
            $successed = Account::insert([
                'username' =>  $credentials['username'],
                'password' => $credentials['password'],
                'auth' => 0
            ]);
            if ($successed) {
                $user = User::create([
                    'email' =>  $credentials['email'],
                    'full_name' => $credentials['name'],
                    'username' => $credentials['username']
                ]);
                Cart::create([
                    'ID_user' => $user->ID_user
                ]);
                session()->setFlash(\FLASH::SUCCESS, "Congratulations !");
                redirect('/login');
            }
        } catch (PDOException $e) {
            session()->setFlash(\FLASH::ERROR, "Something went wrong. Please try again.");
            return $this->sendPage('auth/Register');
        }
    }
    public function getCredentials()
    {
        return [
            'name' => $_POST['name'] ?? null,
            'username' => $_POST['username'] ?? null,
            'full_name' => $_POST['name'] ?? null,
            'email' => $_POST['email'] ?? null,
            'password' => $_POST['password'] ?? null,
            'confirm_password' => $_POST['confirm_password'] ?? null
        ];
    }
}
