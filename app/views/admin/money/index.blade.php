@extends('layout.main')

@section('main-content')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cộng trừ tiền</h4>
                    <p class="card-description">Cộng trừ tiền thành viên</p>
                    <form class="forms-sample" method="POST">

                        <div class="form-group">
                            <label for="exampleInputName1">Nhập tên đăng nhập người dùng</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Số tiền</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="money"
                                placeholder="Nhập số tiền cần cộng trừ" />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Lý do</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Loại</label>
                            <select name="type" id="type" class="form-control">
                                <option value="2">Cộng tiền</option>
                                <option value="3">Trừ tiền</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Thực Hiện </button>
                        <a href="{{ BASE_URL }}admin/" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    
    if (isset($_SESSION['edit_success'])) {
        echo "<script type='text/javascript'>
    
    			Swal.fire({
    				position: 'center',
      	icon: 'success',
      	title: '{$_SESSION['edit_success']}',
      	showConfirmButton: false,
      	timer: 1500
    })
        </script>";
        unset($_SESSION['edit_success']);
    } else {
        unset($_SESSION['edit_success']);
    }
    ?>

    
@endsection
