<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\JWT;

class RegisterController extends Controller
{
    public function __construct()
    {
        // Nếu người dùng đã đăng nhập thì không cho đăng ký
        if (JWT::isLogin()) {
            redirect('/home');
        }
        
        parent::__construct();
    }

    public function showRegisterForm()
    {
        // Thu thập dữ liệu cho view
        $data = [
            'old' => session_get_once('form'),
            'errors' => session_get_once('errors')
        ];  

        // Tạo và hiển thị view
        require_once '../views/Auth/register.php';
    }

    public function register()
    {

        // Đọc giá trị của form
        $data = $this->getUserData();

        $this->saveFormValues(['password', 'password_confirmation']);

        $user = new User();
        if ($user->validate($data)) {
            // Dữ liệu hợp lệ...
            $this->createUser($data);
            $messages = ['success' => 'User has been created successfully.'];
            // redirect('/login', ['messages' => $messages]);
            print_r($messages);
        }

        // Dữ liệu không hợp lệ...
        // redirect('/register', ['errors' => $user->getErrors()]);
        print_r($user->getErrors());
    }

    protected function getUserData()
    {
        return [
            'name' => filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING),
            'email' => filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL),
            'password' => $_POST['password'],
            'password_confirmation' => $_POST['password_confirmation']
        ];
    }

    protected function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);    
    }
}
