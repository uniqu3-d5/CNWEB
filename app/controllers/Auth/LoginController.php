<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\JWT;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Nếu người dùng đã đăng nhập thì không hiện trang đăng nhập
        if (JWT::isLogin()) {
            redirect('/home');
        }

        // Thu thập dữ liệu cho view
        $data = [
            'messages' => session_get_once('messages'),
            'old' => session_get_once('form'),
            'errors' => session_get_once('errors')
        ];             

        // Tạo và hiển thị view
        require_once ROOTDIR.'/views/Auth/login.php';
    }

    public function login()
    {

        // Đọc giá trị của form
        $userCredentials = $this->getUserCredentials();
        $errors = [];
        $user = User::where('email', $userCredentials['email'])->first();
        if ($user === null) {
            // Người dùng không tồn tại...
            $errors['email'] = 'Unknown email.';
        } else if (JWT::login($user, $userCredentials)) {
            // Đăng nhập thành công...
            redirect('/home');
        } else {
            // Sai mật khẩu...
            $errors['password'] = 'Incorrect password.';
        }

        // Đăng nhập không thành công...
        $this->saveFormValues(['password']);
        $_SESSION['errors'] = $errors;
        require_once ROOTDIR.'/views/Auth/login.php';
    }

    public function logout()
    {
        setcookie("token", "", time() - 3600);
        redirect('/login');
    }

    protected function getUserCredentials()
    {
        return [
            'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
            'password' => $_POST['password']
        ];        
    }
}
