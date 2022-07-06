<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Transactions;
use App\Models\User;

class OrdersController
{
    public function index()
    {
        $orders = Orders::all();
        return view_admin('orders.index', [
            'title' => "List Orders",
            'orders' => $orders
        ]);
    }
    public function delete($id)
    {
        Orders::find($id)->delete();
    }

    public function editForm($id)
    {
        $orders = Orders::find($id);
        return view_admin('orders.edit', [
            "title" => "Edit Order",
            "order" => $orders
        ]);
    }

    public function saveEdit($id)
    {
        $order = Orders::find($id);
        $user = User::find($_POST['userid']);

        if ($_POST['status'] == '4') {
            $user->update(['balance' => $user->balance + $order->total]);
            Transactions::create([
                'user_id' => $user->id,
                'type' => 4,
                'amount' => $order->total,
                'balance' => $user->balance,
                'description' => 'Hoàn tiền',
            ]);
        }
        $order->update(['status' => $_POST['status']]);

        $_SESSION['edit_success'] = "Cập nhật thành công";
        header('location: ' . BASE_URL . 'admin/orders/');
        die;
    }

    public function history()
    {
        $sidebarCategories = Categories::all();
        $userId = User::find($_SESSION['user_id']);
        $orders = Orders::where('user_id', '=', $userId->id)->get();
        return view_client('client.history', [
            'title' => "Lịch sử đơn",
            'sidebarCategories' => $sidebarCategories,
            'user' => $userId,
            'orders' => $orders
        ]);
    }
    public function detail($id)
    {
        $sidebarCategories = Categories::all();
        $userId = User::find($_SESSION['user_id']);
        $order = Orders::find($id);
        return view_client('client.detail', [
            'title' => "Chi tiết đơn hàng",
            'sidebarCategories' => $sidebarCategories,
            'user' => $userId,
            'order' => $order
        ]);
    }

    // cập nhật tài khoản
    public function updateForm($id)
    {
        $sidebarCategories = Categories::all();
        $userId = User::find($_SESSION['user_id']);
        $order = Orders::find($id);
        return view_client('client.update_account', [
            'title' => "Cập nhật tài khoản",
            'sidebarCategories' => $sidebarCategories,
            'user' => $userId,
            'order' => $order
        ]);
    }
}
