<?php

namespace App\Controllers;

use App\Models\Categories;

class CategoriesController
{
    public function index()
    {
        $listCategories = Categories::all();
        return view_admin('categories.index', [
            'title' => "List Categories",
            'categories' => $listCategories,
        ]);
    }
    public function insert()
    {
        Categories::create([
            "name" => $_POST["name"],
            "status"=>1,
            "icon" => $_POST["icon"],
            "slug" => $_POST['slug']

        ]);
  
    }
    public function delete($id){
         Categories::find($id)->delete();
        header('location: ' . BASE_URL . 'admin/categories');
        die;
    }

    public function editForm($id){
        $cate = Categories::find($id);
        return view_admin('categories.edit',[
            "title" => "Edit Category",
            "category" => $cate
        ]);
        
    }

    public function saveEdit($id){
        $cate = Categories::find($id);

        if(!$cate){
            header('location: ' . BASE_URL . 'admin/categories/edit/'.$id);
            die;
        }
        if($_POST["name"] == 0 || $_POST["name"] == "" || $_POST["slug"] == "" || $_POST["icon"] == ""){
            $_SESSION["error"] = "Không được để trống dữ liệu ";
            header('location: ' . BASE_URL . 'admin/categories/edit/'.$id);
            die;
        }
        $_SESSION["edit_success"] = "Cập nhật thành công";
        $cate->name = $_POST["name"];
        $cate->slug = $_POST["slug"];
        $cate->status = $_POST["status"];
        $cate->icon = $_POST["icon"];
        $cate->save();
        header('location: ' . BASE_URL . 'admin/categories/');
        die;



    }
}
