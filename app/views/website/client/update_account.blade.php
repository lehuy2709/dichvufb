@extends('layout.main_client')
@section('main-content-client')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cập nhật tài khoản</h4>
                    <p class="card-description">Tài Khoản {{ $user->username }}</p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" id="updateForm">

                        <input type="text" class="form-control" name="id" value="{{ $user->id }}" id="userid"
                            readonly disabled hidden />
                        <div class="form-group">
                            <label for="exampleInputName1">UserName</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="username"
                                value="{{ $user->username }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="email"
                                value="{{ $user->email }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" />
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Vai trò</label>
                            <input type="text" class="form-control" value="{{ $user->role == 2 ? 'User' : '' }}"
                                disabled>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="balance" class="form-label">Số dư</label>
                                <input type="text" id="balance" name="balance" class="form-control"
                                    value="{{ number_format($user->balance) }}đ" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="amount_deposited" class="form-label">Số tiền đã nạp</label>
                                <input type="text" id="amount_deposited" class="form-control"
                                    value="{{ number_format($user->amount_deposited) }}đ" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="amount_spent" class="form-label">Số tiền đã dùng</label>
                                <input type="text" id="amount_spent" class="form-control"
                                    value="{{ number_format($user->amount_spent) }}đ" disabled>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Update </button>
                        <a href="{{ BASE_URL }}home" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
    
    		Swal.fire({
      		icon: 'error',
      		title: 'Có lỗi xảy ra',
     		 text: '{$_SESSION['error']}',
    			})
        </script>";
        unset($_SESSION['error']);
    } else {
        unset($_SESSION['error']);
    }
    ?>
@endsection
