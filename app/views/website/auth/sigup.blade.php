<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	


	<link rel="icon" type="image/png" href="{{BASE_URL}}public/client/images/logonew.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{BASE_URL}}public/auth/css/main.css">
<!--===============================================================================================-->
<script src="{{BASE_URL}}public/ajax/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" id="#form">
					<span class="login100-form-title p-b-43 font-custom">
						Đăng ký hệ thống
					</span>

					<div class="wrap-input100 ">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Tên Tài Khoản</span>
					</div>
					
					
					<div class="wrap-input100">
						<input class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật Khẩu</span>
					</div>

                    <div class="wrap-input100">
						<input class="input100" type="password" name="repass" id="repass">
						<span class="focus-input100"></span>
						<span class="label-input100">Nhập Lại Mật Khẩu</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div>
							<a href="{{BASE_URL}}" class="txt1 font-custom">
							    Quay lại trang chủ
							</a>
						</div>

						<div>
							<a href="dang-nhap" class="txt1 font-custom">
								Bạn đã có tài khoản?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn register">
						<button class="login100-form-btn register" id="btn-reg">
							Đăng Ký
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Hoặc đăng nhập với
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('{{BASE_URL}}public/auth/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<?php
	if(isset($_SESSION['error'])){
		echo "<script type='text/javascript'>

		Swal.fire({
  		icon: 'error',
  		title: 'Có lỗi xảy ra',
 		 text: '{$_SESSION['error']}',
			})
    </script>";
		unset($_SESSION['error']);
	}
	else {
		unset($_SESSION['error']);
	}

   ?>

	
	
<!--===============================================================================================-->
<script src="{{BASE_URL}}public/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{BASE_URL}}public/auth/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{BASE_URL}}public/auth/vendor/bootstrap/js/popper.js"></script>
	<script src="{{BASE_URL}}public/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{BASE_URL}}public/auth/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{BASE_URL}}public/auth/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{BASE_URL}}public/auth/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{BASE_URL}}public/auth/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{BASE_URL}}public/auth/js/main.js"></script>

</body>
</html>