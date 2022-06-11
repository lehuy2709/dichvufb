<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<?php
	if(isset($_SESSION['success'])){
		echo "<script type='text/javascript'>

			Swal.fire({
				position: 'center',
  	icon: 'success',
  	title: '{$_SESSION['success']}',
  	showConfirmButton: false,
  	timer: 1500
})
    </script>";
		unset($_SESSION['success']);
	}
	else {
		unset($_SESSION['success']);
	}
    ?>
<script src="{{BASE_URL}}public/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{BASE_URL}}public/admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/flot/jquery.flot.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <script src="{{BASE_URL}}public/admin/assets/js/hoverable-collapse.js"></script>
    <script src="{{BASE_URL}}public/admin/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{BASE_URL}}public/admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->