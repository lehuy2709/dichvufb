@extends('layout.main')
{{-- @section('add')
    <div class="d-flex">
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
        <button type="button" class="btn btn-sm ml-3 btn-success" name="add" id="add" data-toggle="modal"
            data-target="#add_data_Modal"> Add Categories </button>
    </div>
@endsection() --}}

@section('main-content')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User</h4>
                    <p class="card-description">Edit User</p>
                    <form class="forms-sample" method="POST">

                        <input type="text" class="form-control" id="exampleInputName1" name="id"
                            value="{{ $user->id }}" readonly disabled hidden />
                        <div class="form-group">
                            <label for="exampleInputName1">UserName</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="username"
                                value="{{ $user->username }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="email"
                                value="{{ $user->email }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Vai trò</label>
                            <select class="form-control" id="exampleSelectGender" name="role">
                                @if ($user->role == 1)
                                    <option selected value="{{ $user->role }}">Admin</option>
                                    <option value="{{ $user->role = 2 }}">User</option>
                                @else
                                    <option selected value="{{ $user->role }}">User</option>
                                    <option value="{{ $user->status = 1 }}">Admin</option>
                                @endif
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="balance" class="form-label">Số dư</label>
                                <input type="text" id="balance" name="balance" class="form-control" value="{{ number_format($user->balance) }}đ" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="amount_deposited" class="form-label">Số tiền đã nạp</label>
                                <input type="text" id="amount_deposited" class="form-control" value="{{ number_format($user->amount_deposited) }}đ" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="amount_spent" class="form-label">Số tiền đã dùng</label>
                                <input type="text" id="amount_spent" class="form-control" value="{{ number_format($user->amount_spent) }}đ" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Update </button>
                        <a href="{{ BASE_URL }}admin/users" class="btn btn-light">Cancel</a>
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
