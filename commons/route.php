<?php

use App\Controllers\CategoriesController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MoneyController;
use App\Controllers\OrdersController;
use App\Controllers\PackagesController;
use App\Controllers\ServicesController;
use App\Controllers\UsersController;
use App\Models\Money;
use App\Models\Packages;
use App\Models\Services;
use Illuminate\Support\Facades\Request;
use Phroute\Phroute\RouteCollector;

function applyRoute($url){
    $router = new RouteCollector();
    // home page 
    $router->get('/',[HomeController::class,'client']);

    $router->filter('auth',function(){
        if(!isset($_SESSION['admin_id'])|| empty($_SESSION['admin_id'])){
            $_SESSION['error_role'] = "Bạn không có quyền truy cập";
            header('location: ' . BASE_URL . 'dang-nhap');
        }
    });  
    $router->filter('authClient',function(){
        if(!isset($_SESSION['user_id'])|| empty($_SESSION['user_id'])){
            $_SESSION['error_role'] = "Bạn phải đăng nhập để truy cập";
            header('location: ' . BASE_URL . 'dang-nhap');
        }
    }); 

    $router->get('dang-nhap',[LoginController::class,'login_form']);
    $router->post('dang-nhap',[LoginController::class,'save_login']);
    $router->get('dang-ky',[LoginController::class,'register_form']);
    $router->post('dang-ky',[LoginController::class,'createAccount']);
    $router->get('dang-xuat',[LoginController::class,'logOut']);

    // admin
    $router->get('dashboard',[DashboardController::class,'index'],['before' => 'auth']);
    $router->get('admin',[DashboardController::class,'index'],['before' => 'auth']);

    $router->get('admin/dashboard',[DashboardController::class,'index'],['before' => 'auth']);
    $router->get('admin/dang-xuat',[LoginController::class,'logOut']);
    $router->get('admin/categories',[CategoriesController::class,'index'],['before' => 'auth']);
    $router->post('admin/categories/insert',[CategoriesController::class,'insert'],['before' => 'auth']);
    $router->get('admin/categories/delete/{id}',[CategoriesController::class,'delete'],['before' => 'auth']);
    $router->get('admin/categories/edit/{id}',[CategoriesController::class,'editform'],['before' => 'auth']);
    $router->post('admin/categories/edit/{id}',[CategoriesController::class,'saveEdit'],['before' => 'auth']);

    // dịch vụ

    $router->get('admin/services',[ServicesController::class,'index'],['before' => 'auth']);
    $router->post('admin/services/insert',[ServicesController::class,'insert'],['before' => 'auth']);
    $router->get('admin/services/delete/{id}',[ServicesController::class,'delete'],['before' => 'auth']);
    $router->get('admin/services/edit/{id}',[ServicesController::class,'editform'],['before' => 'auth']);
    $router->post('admin/services/edit/{id}',[ServicesController::class,'saveEdit'],['before' => 'auth']);

    // gói dịch vụ

    $router->get('admin/packages',[PackagesController::class,'index'],['before' => 'auth']);
    $router->post('admin/packages/insert',[PackagesController::class,'insert'],['before' => 'auth']);
    $router->get('admin/packages/delete/{id}',[PackagesController::class,'delete'],['before' => 'auth']);
    $router->get('admin/packages/edit/{id}',[PackagesController::class,'editform'],['before' => 'auth']);
    $router->post('admin/packages/edit/{id}',[PackagesController::class,'saveEdit'],['before' => 'auth']);

    // orders
    $router->get('admin/orders',[OrdersController::class,'index'],['before' => 'auth']);
    $router->get('admin/orders/delete/{id}',[OrdersController::class,'delete'],['before' => 'auth']);
    $router->get('admin/orders/edit/{id}',[OrdersController::class,'editform'],['before' => 'auth']);
    $router->post('admin/orders/edit/{id}',[OrdersController::class,'saveEdit'],['before' => 'auth']);

    // users
    $router->get('admin/users',[UsersController::class,'index'],['before' => 'auth']);
    $router->get('admin/users/delete/{id}',[UsersController::class,'delete'],['before' => 'auth']);
    $router->get('admin/users/edit/{id}',[UsersController::class,'editForm'],['before' => 'auth']);
    $router->post('admin/users/edit/{id}',[UsersController::class,'saveEdit'],['before' => 'auth']);

    // cộng trừ tiền
    $router->get('admin/money',[MoneyController::class,'index'],['before' => 'auth']);
    $router->post('admin/money',[MoneyController::class,'handleMoney'],['before' => 'auth']);

    // trang chủ

    $router->get('home',[HomeController::class,'index'],['before' => 'authClient']);
    $router->get('service/{category}/{service}',[HomeController::class,'index_orders'],['before' => 'authClient']);
    $router->post('service/{category}/{service}',[HomeController::class,'order'],['before' => 'authClient']);
    $router->get('service/get-package-price',[ServicesController::class,'getPackagePrice'],['before' => 'authClient']);
    $router->get('order/history',[OrdersController::class,'history'],['before' => 'authClient']);
    $router->get('order/detail/{id}',[OrdersController::class,'detail'],['before' => 'authClient']);
    $router->get('user/cap-nhat/{id}',[OrdersController::class,'updateForm'],['before' => 'authClient']);
    $router->post('user/cap-nhat/{id}',[UsersController::class,'saveUpdateUser'],['before' => 'authClient']);
    $router->get('user/history',[UsersController::class,'history'],['before' => 'authClient']);
    $router->get('user/banking',[UsersController::class,'banking'],['before' => 'authClient']);



    // $router->get('service/{category}/{service}',[HomeController::class,'index_orders'],['before' => 'authClient']);
    // $router->get('service',[HomeController::class,'index_orders'],['before' => 'authClient']);


    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;

}


?>