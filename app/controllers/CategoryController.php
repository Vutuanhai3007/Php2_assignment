<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;
use App\Models\Category;


class CategoryController extends BaseController{

    public function demoLayout(){
        $this->render('layouts.main');
    }
    public function listCategory(){
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : "";
        if(empty($keyword)){
            $categories = Category::all();
        }else{
            $categories = Category::where('name', 'like', "%$keyword%")->get();
        }
        
        return $this->render('category.list', compact('keyword', 'categories'));
    }

    public function categoryAddForm(){
        $categories = Category::all();
        return $this->render('category.add-form', compact('categories'));
    }

    public function addNewCategory(){
        
        $model = new Category();
        $model->fill($_POST);
        $model->save();
        header("location:" . BASE_URL . 'danh-sach-dm');die;
    }

    public function removeCategory($id){
        
        Category::destroy($id);
        header("location:" . BASE_URL . 'danh-sach-dm');die;
    }

    public function categoryEditForm($id){
        $category = Category::find($id);
        // $roles = Role::all();
        return $this->render('category.edit-form', compact('category'));
    }

    public function saveEditCategory($id){
        
        $category = Category::find($id);
        $category->fill($_POST);
        $category->save();
        header("location:" . BASE_URL . 'danh-sach-dm');die;
    }
}

?>