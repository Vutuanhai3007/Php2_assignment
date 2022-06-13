<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "Đây là trang chủ";
});

$router->get('login', [App\Controllers\AuthController::class, 'loginForm']);
$router->post('login', [App\Controllers\AuthController::class, 'postLogin']);

$router->any('logout', [App\Controllers\AuthController::class, 'logout']);
// tất cả các đường dẫn nằm trong này thì phải thỏa mãn điều kiện đã đăng nhập
$router->group(['before' => 'auth'], function($router){
    // phân biệt request method ->get(), ->post(), ->put(), ->any(),..
    $router->get('danh-sach-tk', [App\Controllers\HomeController::class, 'listUser']);

    $router->get('tao-tk', [App\Controllers\HomeController::class, 'userAddForm']);
    $router->post('tao-tk', [App\Controllers\HomeController::class, 'addNewUser']);

    // có thể có tham số đường dẫn - thể hiện bằng {tên tham số}
    $router->get('sua-tk/{id}', [App\Controllers\HomeController::class, 'userEditForm']);
    $router->post('sua-tk/{id}', [App\Controllers\HomeController::class, 'saveEditUser']);

    $router->get('xoa-tk/{id}', [App\Controllers\HomeController::class, 'removeUser']);



    // Sản phẩm
    $router->get('danh-sach-sp', [App\Controllers\ProductController::class, 'listProduct']);
    $router->get('tao-sp', [App\Controllers\ProductController::class, 'productAddForm']);
    $router->post('tao-sp', [App\Controllers\ProductController::class, 'addNewProduct']);
    $router->get('sua-sp/{id}', [App\Controllers\ProductController::class, 'productEditForm']);
    $router->post('sua-sp/{id}', [App\Controllers\ProductController::class, 'saveEditProduct']);
    $router->get('xoa-sp/{id}', [App\Controllers\ProductController::class, 'removeProduct']);



    // Danh mục sản phẩm


    $router->get('danh-sach-dm', [App\Controllers\CategoryController::class, 'listCategory']);
    $router->get('tao-dm', [App\Controllers\CategoryController::class, 'categoryAddForm']);
    $router->post('tao-dm', [App\Controllers\CategoryController::class, 'addNewCategory']);
    $router->get('sua-dm/{id}', [App\Controllers\CategoryController::class, 'categoryEditForm']);
    $router->post('sua-dm/{id}', [App\Controllers\CategoryController::class, 'saveEditCategory']);
    $router->get('xoa-dm/{id}', [App\Controllers\CategoryController::class, 'removeCategory']);

});


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>