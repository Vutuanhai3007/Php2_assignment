<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;

class HomeController extends BaseController{

    public function demoLayout(){
        $this->render('layouts.main');
    }
    public function listUser(){
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : "";
        if(empty($keyword)){
            $users = User::all();
        }else{
            $users = User::where('name', 'like', "%$keyword%")->get();
        }
        
        return $this->render('user.list', compact('keyword', 'users'));
    }

    public function userAddForm(){
        $roles = Role::all();
        return $this->render('user.add-form', compact('roles'));
    }

    public function addNewUser(){
        
        extract($_POST);
        $nameerr = "";
        $emailerr = "";
        $passworderr= "";
        $avatarerr = "";
        $phone_numbererr = "";

         // neu co ten hinh thi lay, con khong co thi tra ve ''
         $avatar = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : '';
        
        if(strlen($name) == 0){
            $nameerr = "Không được để trống tên";
        }

        if(strlen($email) == 0){
            $emailerr = "Không được để trống email";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailerr = "Không đúng định dạng email";
        }else if(User::where('email', $email)->count() > 0){
            $emailerr = "Email đã tồn tại";
        }

        if(strlen($password) == 0){
            $passworderr = "Không được để trống mật khẩu";
        }
        if(strlen($avatar) == 0){
            $avatarerr = "Không được để trống avatar";
        }
        if(strlen($phone_number) == 0){
            $phone_numbererr = "Không được để trống số điện thoại";
        }


        if(strlen($nameerr . $emailerr . $passworderr . $avatarerr . $phone_numbererr) > 0){
            header('location: ' . BASE_URL . "tao-tk?nameerr=$nameerr&emailerr=$emailerr&passworderr=$passworderr&avatarerr=$avatarerr&phone_numbererr=$phone_numbererr");die;
        }

        $model = new User();
        $model->fill($_POST);
        // xử lý ảnh
        $filename = "";
        $avatarFile = $_FILES['avatar'];
        if($avatarFile['size'] > 0){
            $filename = uniqid() . '-' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], './public/uploads/avatars/' . $filename);
            $filename = "public/uploads/avatars/" . $filename;
        }
      
        // mã hóa mật khẩu
        $model->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->avatar = $filename;
        $model->save();
        header("location:" . BASE_URL . 'danh-sach-tk');die;
    }

    public function removeUser($id){

        
        User::destroy($id);
        header("location:" . BASE_URL . 'danh-sach-tk');die;
    }

    public function userEditForm($id){

      
        $user = User::find($id);
        $roles = Role::all();
        return $this->render('user.edit-form', compact('user', 'roles'));
    }

    public function saveEditUser($id){
        
        extract($_POST);
        $nameerr = "";
        $emailerr = "";
        $passworderr= "";
        $avatarerr = "";
        $phone_numbererr = "";

         // neu co ten hinh thi lay, con khong co thi tra ve ''
         $avatar = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : '';
        
        if(strlen($name) == 0){
            $nameerr = "Không được để trống tên";
        }

        if(strlen($email) == 0){
            $emailerr = "Không được để trống email";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailerr = "Không đúng định dạng email";
        }else if(User::where('email', $email)->count() > 0){
            $emailerr = "Email đã tồn tại";
        }

        if(strlen($password) == 0){
            $passworderr = "Không được để trống mật khẩu";
        }
        if(strlen($avatar) == 0){
            $avatarerr = "Không được để trống avatar";
        }
        if(strlen($phone_number) == 0){
            $phone_numbererr = "Không được để trống số điện thoại";
        }
        $user = User::find($id);
        $user->fill($_POST);
        $filename= $user-> avatar;
        $avatarFile = $_FILES['avatar'];
        if($avatarFile['size'] > 0){
            $filename = uniqid() . '-' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], './public/uploads/avatars/' . $filename);
            $filename = "public/uploads/avatars/" . $filename;
        }
        $user->avatar = $filename;
        $user->save();
        header("location:" . BASE_URL . 'danh-sach-tk');die;
    }
}

?>