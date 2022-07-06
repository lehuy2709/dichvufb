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
                    <h4 class="card-title">Orders</h4>
                    <p class="card-description"> List Orders
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thời gian</th>
                                    <th>Người đặt</th>
                                    <th>Dịch vụ</th>
                                    <th>Thành tiền</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $ord)
                                    <tr>
                                        <td>{{ $ord->id }}</td>
                                        <td>{{ $ord->created_at }}</td>
                                        <td>{{ $ord->user->username }}</td>
                                        <td>{{ $ord->package->service->name }} - {{ $ord->package->name }}</td>
                                        <td>{{ number_format($ord->total) }}đ</td>
                                        <td>{{ $ord->note }}</td>
                                        <td>
                                            @if($ord->status == 1 )
                                                <span class="badge badge-warning">Đang xử lý</span>
                                            @elseif($ord->status == 2)
                                                <span class="badge badge-primary">Đang thực hiện</span>
                                            @elseif($ord->status == 3)
                                                <span class="badge badge-success">Hoàn thành</span>
                                            @elseif($ord->status == 4)
                                                <span class="badge badge-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{BASE_URL}}admin/orders/edit/{{$ord->id}}"><i class="mdi mdi-border-color"
                                                            style="font-size: 20px;"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data="{{ $ord->id }}" id="delete"><i
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
        $(document).ready(function(){

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
                            url: '{{ BASE_URL }}/admin/orders/delete/' + id,
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
    if(isset($_SESSION['edit_success'])){
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
	}
	else {
		unset($_SESSION['edit_success']);
	}
?>
@endsection
