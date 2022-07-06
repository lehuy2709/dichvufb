<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Packages;
use App\Models\Services;
use App\Models\Transactions;
use App\Models\User;

class HomeController
{
    public function client()
    {
        return view_client('client.client');
    }
    public function index()
    {
        $sidebarCategories = Categories::all();
        $userId = User::find($_SESSION['user_id']);
        $totalCoinDeposited = Transactions::where('user_id','=',$userId->id)->where('type','=',2)->sum('amount');
        $totalCoinSpent = Transactions::where('user_id','=',$userId->id)->where('type','=',1)->sum('amount');
        $totalOrder = Orders::where('user_id','=',$userId->id)->count('id');
        $topCoin = Transactions::join('tbl_users','tbl_transactions.user_id','=','tbl_users.id')->select('*',Transactions::raw("sum(amount) as tong"))->where('type','=',2)->groupBy('user_id')->orderBy('tong','DESC')->get();
        return view_client('client.homepage', [
            'title' => "Trang chủ",
            "sidebarCategories" => $sidebarCategories,
            "user" => $userId,
            "totalCoinDeposited"=>$totalCoinDeposited,
            "totalCoinSpent"=>$totalCoinSpent,
            'totalOrder'=>$totalOrder,
            'topCoin' => $topCoin
        ]);
    }
    public function index_orders($category,$service)
    {
        $sidebarCategories = Categories::all();
        $dataSerivice = Services::where('slug',$service)->first();
        $dataCategory = Categories::where('slug',$category)->first();
        $userId = User::find($_SESSION['user_id']);
        
        return view_client('client.order', [
            'title' => "Tạo Đơn",
            "sidebarCategories"=>$sidebarCategories,
            "service" => $dataSerivice,
            "category"=>$dataCategory,
            "user" => $userId
        ]);
    }
    public function order($category,$service){

        $dataNewSerivice = Services::where('slug',$service)->first();
        $package = $dataNewSerivice->packages()->find($_POST['id']);
        $user = User::find($_SESSION['user_id']);
        $order = Orders::create([
            'user_id'=>$_SESSION['user_id'],
            'package_id'=>$_POST['id'],
            'input'=>$_POST['input'],
            'quantity'=>intval($_POST['quantity']),
            'note'=>$_POST['note'],
            'status'=>1,
            'total'=>intval($_POST['total'])

        ]);
        // $_SESSION["balance"] = $_SESSION["balance"] - $_POST['total'];
        $user->update([
            "balance"=> $user->balance - $_POST['total']
        ]);
     
        Transactions::create([
            'user_id' => $user->id,
            'type' => 1,
            'amount' => $_POST['total'],
            'balance' => $user->balance,
            'description' => 'Đặt đơn dịch vụ #' . $order->id,
        ]);
        
    }

}
