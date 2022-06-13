<?php
namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController{

    public function loginForm(){
        return $this->render('auth.login');
    }

    public function postLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->first();
        if($user && password_verify($password, $user->password)){
            $_SESSION['auth'] = $user;
            header('location: ' . BASE_URL . 'danh-sach-tk');die;
        }

        header('location: ' . BASE_URL . 'login?msg=Đăng nhập không thành công!');die;
    }

    public function logout(){
        unset($_SESSION['auth']);
        header('location: ' . BASE_URL . 'login');die;
    }
}

?>