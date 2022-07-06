<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Packages;
use App\Models\Services;
use Illuminate\Support\Facades\Response;

class ServicesController
{
    public function index()
    {
        $listCategories = Categories::all();
        $listServices = Services::join("tbl_categories","tbl_services.category_id","=","tbl_categories.id")->select("tbl_services.*","tbl_categories.name as name_cate","tbl_categories.status as status_cate","tbl_categories.slug as slug_cate")->get();
        return view_admin('services.index', [
            'title' => "List Services",
            'category' => $listCategories,
            "services" => $listServices
        ]);
    }
    public function insert()
    {
        Services::create([
            "name" => $_POST["name"],
            "lable"=>$_POST["lable"],
            "status"=>1,
            "category_id" => $_POST["category_id"],
            "placeholder" => $_POST['placeholder'],
            "description" => $_POST['description'],
            "slug" => $_POST['slug']

        ]);
  
    }
    public function delete($id){
        Services::find($id)->delete();
        header('location: ' . BASE_URL . 'admin/services');
        die;
    }
    public function editForm($id){
        $listServices = Services::join("tbl_categories","tbl_services.category_id","=","tbl_categories.id")->select("tbl_services.*","tbl_categories.name as name_cate","tbl_categories.status as status_cate","tbl_categories.slug as slug_cate")->where("tbl_services.id",$id)->first();
        $listCategories = Categories::all();
        return view_admin('services.edit',[
            "title" => "Edit Services",
            "services" => $listServices,
            "categories" => $listCategories
        ]);
        
    }
    public function saveEdit($id){
        $services = Services::where("id","=",$id)->first();
        if(!$services){
            $_SESSION["error"] = "Có lỗi gì đó đã xảy ra";
            header('location: ' . BASE_URL . 'admin/categories/edit/'.$id);
            die;
        }
        if($_POST['name'] == "" || $_POST['lable']  ==""  || $_POST['placeholder'] == "" || $_POST['description'] == ""){
            $_SESSION["error"] = "Không được để trống dữ liệu ";
            header('location: ' . BASE_URL . 'admin/services/edit/'.$id);
            die;
        }
        $_SESSION["edit_success"] = "Cập nhật thành công";
        $services->name = $_POST["name"];
        $services->status = $_POST["status"];
        $services->slug = $_POST["slug"];
        $services->category_id = $_POST["category_id"];
        $services->lable = $_POST["lable"];
        $services->placeholder = $_POST["placeholder"];
        $services->description = $_POST["description"];
        $services->save();
        header('location: ' . BASE_URL . 'admin/services/');
        die;

    }
    public function getPackagePrice(){
        $package = Packages::find($_GET['id']);
        echo json_encode($package);
    }   

}
?>