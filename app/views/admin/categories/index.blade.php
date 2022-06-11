@extends('layout.main')
@section('add')
    <div class="d-flex">
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
        <button type="button" class="btn btn-sm ml-3 btn-success" name="add" id="add" data-toggle="modal"
            data-target="#add_data_Modal"> Add Categories </button>
    </div>
@endsection()

@section('main-content')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories</h4>
                    <p class="card-description"> List Categories
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cate)
                                    <tr>
                                        <td>{{ $cate->id }}</td>
                                        <td id="js-table">{{ $cate->name }}</td>
                                        @if ($cate->status == 1)
                                            <td><label class="badge badge-success">HOẠT ĐỘNG</label> </td>
                                        @else
                                            <td><label class="badge badge-warning">ĐÃ TẮT</label> </td>
                                        @endif
                                        <td hidden id="js-slug">{{ $cate->slug }}</td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{BASE_URL}}admin/categories/edit/{{$cate->id}}"><i class="mdi mdi-border-color"
                                                            style="font-size: 20px;"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data="{{ $cate->id }}" id="delete"><i
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
    <div id="add_data_Modal" class="modal fade">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h4 class="modal-title">Add Categories</h4>
                    </div>
                    <div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label>Enter Name Categories</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="VD: Facebook" />
                        <br />
                        <label>Enter Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="VD: facebook " />
                        <br />
                        <label>Enter Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control"
                            placeholder="VD: mdi mdi-facebook" />
                        <br />
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        // create
        let allDataName = document.querySelectorAll('#js-table')
        let allDataSlug = document.querySelectorAll('#js-slug')
        var newArraySlug = []
        let lengthSlug = allDataSlug.length
        for (var i = 0; i < lengthSlug; i++) {
            newArraySlug.push(allDataSlug[i].textContent)
        }


        var newArray = [];
        let lengthData = allDataName.length
        for (var i = 0; i < lengthData; i++) {
            newArray.push(allDataName[i].textContent)
        }
        $(document).ready(function() {

            $('#insert_form').submit(function(e) {
                e.preventDefault()
                var name = $('#name').val()
                var slug = $('#slug').val()
                var icon = $('#icon').val()
                if (newArraySlug.includes(slug)) {
                    swal.fire("Slug đã tồn tại")
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Slug đã tồn tại',

                    })
                    return false
                }
                if (name === "" || slug === "" || icon === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Không được để trống dữ liệu',

                    })
                    return false
                } else if (newArray.includes(name)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Dữ liệu đã tồn tại',

                    })
                    return false
                } else {

                    $.ajax({
                        url: '{{ BASE_URL }}/admin/categories/insert',
                        method: 'POST',
                        data: {
                            name: name,
                            slug: slug,
                            icon: icon
                        },
                        success: function(response) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thêm thành công',
                                showConfirmButton: false,
                                timer: 700
                            })
                            $('#add_data_Modal').modal('hide')
                            setTimeout((function() {
                                window.location.reload();
                            }), 1000);
                        }
                    })
                }




            })

            // delete


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
                            url: '{{ BASE_URL }}/admin/categories/delete/' + id,
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

        });
    </script>
@endsection
