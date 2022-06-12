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
        
        $product = Product::find($id);
        $product->fill($_POST);
        $product->save();
        header("location:" . BASE_URL . 'danh-sach-sp');die;
    }
}

?>