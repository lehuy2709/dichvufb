<?php
namespace App\Controllers;

use App\Models\Money;
use App\Models\Transactions;
use App\Models\User;

class MoneyController
{
    public function index(){
        return view_admin('money.index',[
            'title'=> 'Cộng trừ tiền'
        ]);
    }
    public function handleMoney(){
        $user = User::where('username','=',$_POST['username'])->first();
        $user->balance = $_POST['type'] == 2 ? $user->balance + $_POST['money'] : $user->balance - $_POST['money'];
        $user->save();
        Transactions::create([
            'user_id' => $user->id,
            'type' => $_POST['type'],
            'amount' => $_POST['money'],
            'balance' => $user->balance,
            'description' => $_POST['description'],
        ]);
        $_SESSION['edit_success'] = "Cộng trừ tiền thành công";
        header('location: ' . BASE_URL . 'admin/money/');
        die;


    }

}
?>
