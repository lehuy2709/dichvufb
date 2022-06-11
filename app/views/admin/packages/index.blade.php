@extends('layout.main')
@section('add')
    <div class="d-flex">
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
        <button type="button" class="btn btn-sm ml-3 btn-success" name="add" id="add" data-toggle="modal"
            data-target="#add_data_Modal"> Add Packages </button>
    </div>
@endsection()

@section('main-content')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Packages</h4>
                    <p class="card-description"> List Packages
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên dịch vụ</th>
                                    <th>Tên gói</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng tối thiểu/tối đa</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $pack)
                                    <tr>
                                        <td>{{ $pack->id }}</td>
                                        <td>{{ $pack->name_service }}</td>
                                        <td id="js-table-cate">{{ $pack->name }}</td>
                                        <td>{{ $pack->price }}</td>
                                        <td>{{ $pack->min_quantity }}/{{ $pack->max_quantity }}</td>

                                        @if ($pack->status == 1)
                                            <td><label class="badge badge-success">HOẠT ĐỘNG</label> </td>
                                        @else
                                            <td><label class="badge badge-warning">ĐÃ TẮT</label> </td>
                                        @endif
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ BASE_URL }}admin/packages/edit/{{ $pack->id }}"><i
                                                            class="mdi mdi-border-color" style="font-size: 20px;"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data="{{ $pack->id }}" id="delete"><i
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
                        <h4 class="modal-title">Add Packages</h4>
                    </div>
                    <div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label> Chọn Danh Mục</label>
                        <select class="form-control" id="service_id" name="service_id">
                            <option value="0">Chọn dịch vụ</option>
                            @foreach ($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach ($category->service as $ser)
                                        <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <br />
                        <label>Tên gói dịch vụ</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="VD: Tăng like fb" />
                        <br />
                        <label>Giá tiền</label>
                        <input type="number" name="price" id="price" class="form-control"
                            placeholder="nhập giá gói dịch vụ" />
                        <br />
                        <label>Số lượng tối thiểu</label>
                        <input type="number" name="min_quantity" id="min_quantity" class="form-control"
                            placeholder="nhập số lượng mua tối thiểu " />
                        <br />
                        <label>Số lượng tối đa</label>
                        <input type="number" name="max_quantity" id="max_quantity" class="form-control"
                            placeholder="nhập số lượng mua tối đa" />
                        <br />
                        <label>Ghi chú</label>
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
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
    <script>
        // create
        let allDataName = document.querySelectorAll('#js-table-cate')
        var newArray = [];
        let lengthData = allDataName.length
        for (var i = 0; i < lengthData; i++) {
            newArray.push(allDataName[i].textContent)
        }

        $(document).ready(function() {

            $('#insert_form').submit(function(e) {
                e.preventDefault()
                var name = $('#name').val()
                var service_id = $('#service_id').val()
                var price = $('#price').val()
                var min_quantity = $('#min_quantity').val()
                var max_quantity = $('#max_quantity').val()
                var note = $('#note').val()
                if (name === "" || service_id === "" || price === "" || min_quantity === "" ||
                    max_quantity === "" || note === "" || service_id == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Không được để trống dữ liệu',

                    })
                    return false
                }
                else if (min_quantity > max_quantity) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'số lượng tối đa phải lớn hơn ' + min_quantity,

                    })
                    return false
                }

               else if (newArray.includes(name)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tên gói dịch vụ đã tồn tại',

                    })
                    return false
                } else {
                    $.ajax({
                        url: '{{ BASE_URL }}/admin/packages/insert',
                        method: 'POST',
                        data: {
                            name: name,
                            service_id: service_id,
                            price: price,
                            min_quantity: min_quantity,
                            max_quantity: max_quantity,
                            note: note
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
                            url: '{{ BASE_URL }}/admin/packages/delete/' + id,
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
