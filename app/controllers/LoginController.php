<?php
    namespace App\Controllers;
    use App\Models\User;
use Illuminate\Support\Facades\Redirect;

    class LoginController {
        public function login_form(){
            return view_client('auth.login');
        }
        public function save_login(){
            $user = User::where("username",$_POST["username"])->first();
            if($_POST['username'] != $user->username){
                $_SESSION['error'] = "Tài khoản không tồn tại trong hệ thống";
                header("Location:" . BASE_URL . "dang-nhap");
                die;
            }
            if (password_verify($_POST["pass"], $user->password)) {
                if ($user->role == 1) {
                    $_SESSION["admin_id"] = $user->id;
                    $_SESSION["admin_username"] = $user->username;
                    $_SESSION["admin_email"] = $user->email;
                    $_SESSION["admin_avatar"] = $user->avatar;
                    $_SESSION["balance"] = $user->balance;
                    $_SESSION['success'] = "Đăng nhập thành công";
                    header("Location:" . BASE_URL . "admin");
                    die;
                } else if ($user->role == 2) {
                    $_SESSION["user_id"] = $user->id;
                    $_SESSION["user_name"] = $user->username;
                    $_SESSION["user_email"] = $user->email;
                    $_SESSION["user_avatar"] = $user->avatar;
                    $_SESSION["balance"] = $user->balance;
                    $_SESSION['success'] = "Đăng nhập thành công";
                    header("Location:" . BASE_URL . "home");
                    die;
                }
    
            } else {
                $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác";
                header("Location:" . BASE_URL . "dang-nhap");
                die;
            }
        }

        public function register_form(){
            return view_client('auth.sigup');
        }
        public function createAccount()
        {
           $users = User::all();
    
            foreach ($users as $value) {
                if ($_POST["email"] == $value->email) {
                    $_SESSION["error"] = "Email này đã tồn tại";
                    header("Location:" . BASE_URL . "dang-ky");
                    die;
                }
                if ($_POST["username"] == $value->username) {
                    $_SESSION["error"] = "tài khoản này đã tồn tại";
                    header("Location:" . BASE_URL . "dang-ky");
                    die;
                }
            }
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Email không hợp lệ";
                header("Location:" . BASE_URL . "dang-ky");
                die;
            }
            if ($_POST["username"] == "" || $_POST["pass"] == "" || $_POST['repass'] == "") {
                $_SESSION['error'] = "Các trường không được để trống";
                header("Location:" . BASE_URL . "dang-ky");
                die;
            }
            if($_POST['pass'] != $_POST['repass']){
                $_SESSION['error'] = "Nhập lại mật khẩu không khớp với mật khẩu";
                header("Location:" . BASE_URL . "dang-ky");
                die;
            }
            if (strlen($_POST["pass"]) < 6) {
                $_SESSION['error'] = "Mật khẩu phải từ 6 kí tự trở lên";
                header("Location:" . BASE_URL . "dang-ky");
                die;
            }
            $_SESSION['success'] = "Đăng ký thành công";
            User::create([
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "role" => 2,
                "avatar"=>"user.jpg",
                "password" => password_hash($_POST["pass"], PASSWORD_DEFAULT)
            ]);
            header("Location:" . BASE_URL . "dang-nhap");
        }


        public function logOut()
        {
            session_destroy();
            header("Location:" . BASE_URL . "dang-nhap");
            die;
        }
    }