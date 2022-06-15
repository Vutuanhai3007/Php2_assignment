<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;
use App\Models\Category;

class ProductController extends BaseController{

    public function demoLayout(){
        $this->render('layouts.main');
    }
    public function listProduct(){
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : "";
        if(empty($keyword)){
            $products = Product::all();
        }else{
            $products = Product::where('name', 'like', "%$keyword%")->get();
        }
        
        return $this->render('product.list', compact('keyword', 'products'));
    }

    public function productAddForm(){
        $categories = Category::all();
        return $this->render('product.add-form', compact('categories'));
    }

    public function addNewProduct(){

        extract($_POST);
        $nameerr = "";
        $main_imageerr = "";
        $priceerr= "";
        $promotionerr = "";
        $detailerr = "";

        // neu co ten hinh thi lay, con khong co thi tra ve ''
        $main_image = isset($_FILES['main_image']['name']) ? $_FILES['main_image']['name'] : '';
        
        if(strlen($name) == 0){
            $nameerr = "Không được để trống tên sản phẩm";
        }

        if(strlen($main_image) == 0){
            $main_imageerr = "Không được để trống ảnh sản phẩm";
        }

        if(strlen($price) == 0){
            $priceerr = "Không được để trống giá sản phẩm";
        }

        if(strlen($promotion) == 0){
            $promotionerr = "Không được để trống giảm giá";
        }

        if(strlen($detail) == 0){
            $detailerr = "Không được để trống chi tiết sản phẩm";
        }
        

        if(strlen($nameerr . $main_imageerr . $priceerr . $promotionerr . $detailerr) > 0){
            header('Location: ' . BASE_URL . "tao-sp?nameerr=$nameerr&main_imageerr=$main_imageerr&priceerr=$priceerr&promotionerr=$promotionerr&detailerr=$detailerr");die;
        }

        
        $model = new Product();
        $model->fill($_POST);
        // xử lý ảnh
        $filename = "";
        $avatarFile = $_FILES['main_image'];
        if($avatarFile['size'] > 0){
            $filename = uniqid() . '-' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], './public/uploads/avatars/' . $filename);
            $filename = "public/uploads/avatars/" . $filename;
        }
        $model->main_image = $filename;
        $model->save();
        header("location:" . BASE_URL . 'danh-sach-sp');die;
    }

    public function removeProduct($id){
        
        Product::destroy($id);
        header("location:" . BASE_URL . 'danh-sach-sp');die;
    }

    public function productEditForm($id){
         $product = Product::find($id);
        $categories = Category::all();
        return $this->render('product.edit-form', compact('product', 'categories'));
    }

    public function saveEditProduct($id){
        
        extract($_POST);
        $nameerr = "";
        $main_imageerr = "";
        $priceerr= "";
        $promotionerr = "";
        $detailerr = "";

          // neu co ten hinh thi lay, con khong co thi tra ve ''
        $main_image = isset($_FILES['main_image']['name']) ? $_FILES['main_image']['name'] : '';
        
        if(strlen($name) == 0){
            $nameerr = "Không được để trống tên sản phẩm";
        }

        if(strlen($main_image) == 0){
            $main_imageerr = "Không được để trống ảnh sản phẩm";
        }

        if(strlen($price) == 0){
            $priceerr = "Không được để trống giá sản phẩm";
        }

        if(strlen($promotion) == 0){
            $promotionerr = "Không được để trống giảm giá";
        }

        if(strlen($detail) == 0){
            $detailerr = "Không được để trống chi tiết sản phẩm";
        }

        if(strlen($nameerr .  $priceerr . $promotionerr . $detailerr) > 0){
            header('location: ' . BASE_URL . "sua-sp/$id?nameerr=$nameerr&priceerr=$priceerr&promotionerr=$promotionerr&detailerr=$detailerr");die;
        }

        
        $product = Product::find($id);
        $product->fill($_POST);
        $filename= $product-> main_image;
        $avatarFile = $_FILES['main_image'];
        if($avatarFile['size'] > 0){
            $filename = uniqid() . '-' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], './public/uploads/avatars/' . $filename);
            $filename = "public/uploads/avatars/" . $filename;
        }
        $product->main_image = $filename;
        $product->save();
        header("location:" . BASE_URL . 'danh-sach-sp');die;
    }
}

?>