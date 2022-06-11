<?php
    namespace App\Controllers;

use App\Models\Categories;
use App\Models\Packages;

    class PackagesController {
        public function index(){
            $packages = Packages::join("tbl_services","tbl_packages.service_id","=","tbl_services.id")->select("tbl_packages.*","tbl_services.name as name_service","tbl_services.status as status_serivce")->get();
            $categories = Categories::all();
            return view_admin('packages.index',[
                'title' => "List Packages",
                'categories'=>$categories,
                'packages'=>$packages
            ]);
        }

        public function insert(){

            Packages::create([
                "name" => $_POST["name"],
                "service_id"=>$_POST["service_id"],
                "status"=>1,
                "price" => $_POST["price"],
                "min_quantity" => $_POST['min_quantity'],
                "max_quantity" => $_POST['max_quantity'],
                "note" => $_POST['note']
    
            ]);
        }
        public function delete($id){
            Packages::find($id)->delete();
            header('location: ' . BASE_URL . 'admin/packages');
            die;
        }

        public function editForm($id){
            $packages = Packages::join("tbl_services","tbl_packages.service_id","=","tbl_services.id")->select("tbl_packages.*","tbl_services.name as name_service","tbl_services.status as status_serivce")->where("tbl_packages.id",$id)->first();
            $categories = Categories::all();
            return view_admin('packages.edit',[
                "title" => "Edit Packages",
                'categories'=>$categories,
                'package'=>$packages
            ]);
            
        }
        public function saveEdit($id){
            $package = Packages::where("id","=",$id)->first();
            if(!$package){
                $_SESSION["error"] = "Có lỗi gì đó đã xảy ra";
                header('location: ' . BASE_URL . 'admin/packages/edit/'.$id);
                die;
            }
            if($_POST['service_id'] == "" || $_POST['name']  ==""  || $_POST['price'] == ""  || $_POST['price'] == 0 || $_POST['min_quantity'] == ""
            || $_POST['min_quantity'] == 0 || $_POST['max_quantity'] == "" || $_POST['max_quantity'] == 0 || $_POST['note']==""){
                $_SESSION["error"] = "Không được để trống dữ liệu ";
                header('location: ' . BASE_URL . 'admin/packages/edit/'.$id);
                die;
            }
            else if($_POST['min_quantity']>$_POST['max_quantity'] ){
                $_SESSION["error"] = "Số lượng tối thiểu phải lớn hơn ". $_POST['min_quantity'];
                header('location: ' . BASE_URL . 'admin/packages/edit/'.$id);
                die;
            }
            else{
                $_SESSION["edit_success"] = "Cập nhật thành công";
                $package->service_id = $_POST['service_id'];
                $package->name = $_POST["name"];
                $package->status = $_POST["status"];
                $package->price = $_POST["price"];
                $package->min_quantity = $_POST["min_quantity"];
                $package->max_quantity = $_POST["max_quantity"];
                $package->note = $_POST["note"];
                $package->save();
                header('location: ' . BASE_URL . 'admin/packages/');
                die;
            }
     
    
        }
    }