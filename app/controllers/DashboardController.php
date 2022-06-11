<?php
namespace App\Controllers;
class DashboardController{
    public function index(){
        return view_admin('dashboard',[
            'title' => "Dashboard"
        ]);
    }
}

?>