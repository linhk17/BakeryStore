<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class LoginController extends BaseController
{

    use UserAuthenticateTrait;

    public function showLoginForm()
    {

        // nếu đã login redirect sang home
        if (auth()) {
            redirect("/home");
        }
        return $this->sendPage('auth/Signin');
    }
    public function login(){
        
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        
        if ($user) {
            $user->password = null; // remove password
            session()->set('user', serialize($user)); // chuyển model sang chuỗi

            if (isset($_POST['remember_me'])) {

                // chuyển mảng sang chuỗi để mã hóa
                $str = serialize($credentials);

                // hàm mã hóa chuỗi được định nghĩa trong helpers.
                $encrypted = encrypt($str, ENCRYPTION_KEY);

                // cookie hết hạn 01/12/2022 23:59:59
                setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 1, 2022));
            }
            if ($user->auth === 1) {
                redirect('/admin');
            } else
                redirect('/home');
        }
        // nếu login sai show form login và hiển thị lỗi
        session()->setFlash(\FLASH::ERROR, "Username or Password is invalid !");
        return $this->sendPage('auth/Signin');
    }


    public function logout()
    {

        $this->signout();
        //redirect('/home');
        $this->redirect('/home');
    }

    public function getCredentials()
    {
        return [
            'username'  => $_POST['username'] ?? null,
           
            'password'  => $_POST['password'] ?? null,
            'auth' => 0
        ];
    }
}
