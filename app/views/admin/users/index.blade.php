@extends('layout.main')
@section('add')
    {{-- <div class="d-flex">
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
        <button type="button" class="btn btn-sm ml-3 btn-success" name="add" id="add" data-toggle="modal"
            data-target="#add_data_Modal"> Add Categories </button>
    </div> --}}
@endsection()

@section('main-content')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <p class="card-description"> List Users
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Tham gia lúc</th>
                                    <th>Vai trò</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->username }}</td>
                                        <td>{{ $u->created_at }}</td>
                                        <td>
                                            @if ($u->role == 1)
                                                <span class="badge badge-success">Admin</span>
                                            @else
                                                <span class="badge badge-warning">User</span>
                                            @endif
                                        </td>

                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ BASE_URL }}admin/users/edit/{{ $u->id }}"><i
                                                            class="mdi mdi-border-color" style="font-size: 20px;"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data="{{ $u->id }}" id="delete"><i
                                                            class="mdi mdi-delete"
                                                            style="color: red; font-size: 20px;"></i></a>
                                                </li>
                                            </ul>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '#delete', function() {
                var id = $(this).attr('data');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Bạn thực sự muốn xóa nó ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ BASE_URL }}/admin/users/delete/' + id,
                            method: 'GET',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Bạn đã xóa thành công',
                                    'success'
                                )
                                setTimeout((function() {
                                    window.location.reload();
                                }), 1000);

                            }
                        })

                    }
                })



            })



        })
    </script>
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
