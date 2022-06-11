<?php

namespace App\Controllers;

use App\Models\Categories;

class HomeController{
        public function client(){
            return view_client('client.client');
        }
        public function index(){
            $sidebarCategories = Categories::all();
            return view_client('client.homepage',[
                'title'=>"Trang chủ",
                "sidebarCategories" =>$sidebarCategories
            ]);
        }
}