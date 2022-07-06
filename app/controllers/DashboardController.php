<?php
namespace App\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class DashboardController{
    public function index(){
        $totalUser = User::count('*');
        $totalUserToday = User::whereDay('created_at','=',date('d'))->count('*');
        return view_admin('dashboard',[
            'title' => "Dashboard",
            'totalUser'=>$totalUser,
            'totalUserToday'=> $totalUserToday
        ]);
    }
}

?>