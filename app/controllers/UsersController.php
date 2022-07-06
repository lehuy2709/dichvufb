<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Transactions;
use App\Models\User;

class UsersController
{
    public function index()
    {
        $users = User::all();
        return view_admin('users.index', [
            'title' => 'List Users',
            'users' => $users
        ]);
    }
    public function delete($id)
    {
        User::find($id)->delete();
    }
    public function editForm($id)
    {
        $user = User::find($id);
        return view_admin('users.edit', [
            'title' => "Edit User",
            'user' => $user
        ]);
    }
    public function saveEdit($id)
    {
        $user = User::find($id);

        if (!$user) {
            header('location: ' . BASE_URL . 'admin/users/edit/' . $id);
            die;
        }
        if ($_POST["username"] == 0 || $_POST["email"] == "") {
            $_SESSION["error"] = "Không được để trống dữ liệu ";
            header('location: ' . BASE_URL . 'admin/users/edit/' . $id);
            die;
        }
        $_SESSION["edit_success"] = "Cập nhật thành công";
        $user->username = $_POST["username"];
        $user->email = $_POST["email"];
        $user->role = $_POST["role"];
        $user->save();
        header('location: ' . BASE_URL . 'admin/users/');
        die;
    }

    public function saveUpdateUser($id)
    {
        $user = User::find($id);
        $target_dir = "../follownhanh/images/";
        $fileUpload = $_FILES['avatar'];

        if ($fileUpload["size"] > 0) {
            if (strpos($fileUpload['type'], "image") === false) {
                $_SESSION['error'] = "Phải là ảnh";
                header("Location:" . BASE_URL . "user/cap-nhat/$user->id");
                die;
            } else if ($fileUpload['size'] > 3000000) {
                $_SESSION['error'] = "ảnh phải nhỏ hơn 3m";
                header("Location:" . BASE_URL . "user/cap-nhat/$user->id");
                die;
            } else {
                $fileName = $fileUpload["name"];
                $path = $target_dir . $fileName;
            }
        } else {
            $fileName = $user->avatar;
            $path = $target_dir . $fileName;
        }

        move_uploaded_file($fileUpload['tmp_name'], $path);
        $user->avatar = $fileName;
        $user->save();
        $_SESSION["edit_success"] = "Cập nhật thành công";
        header('location: ' . BASE_URL . 'home');
        die;
    }
    public function history(){
        $sidebarCategories = Categories::all();
        $userId = User::find($_SESSION['user_id']);
        $history = Transactions::where('user_id','=',$userId->id)->get();
        return view_client('client.history_user',[
            'title'=>'Lịch sử giao dịch',
            'sidebarCategories' => $sidebarCategories,
            'user' => $userId,
            'data'=>$history
        ]);
    }
    public function banking(){
        $sidebarCategories = Categories::all();
        $userId = User::find($_SESSION['user_id']);
        return view_client('client.banking',[
            'title'=>'Nạp tiền',
            'sidebarCategories' => $sidebarCategories,
            'user' => $userId
        ]);
    }
}
