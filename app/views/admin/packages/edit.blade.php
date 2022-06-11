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
                    <h4 class="card-title">Packages</h4>
                    <p class="card-description">Edit Packages</p>
                    <form class="forms-sample" method="POST">

                        <input type="text" class="form-control" id="exampleInputName1" name="id"
                            value="{{ $package->id }}" readonly disabled hidden />
                        <div class="form-group">
                            <label for="exampleSelectGender">Dịch vụ</label>
                            <select class="form-control" data-choices name="service_id" id="service_id">
                                <option value="0">Chọn dịch vụ</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                        @foreach ($category->service as $ser)
                                            @if ($package->service_id == $ser->id)
                                                <option selected value="{{ $ser->id }}">{{ $ser->name }}</option>
                                            @else
                                                <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tên gói dịch vụ</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name"
                                value="{{ $package->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Giá tiền</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="price"
                                value="{{ $package->price }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Số lượng tối thiểu</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="min_quantity"
                                value="{{ $package->min_quantity }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Số lượng tối đa</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="max_quantity"
                                value="{{ $package->max_quantity }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Ghi chú</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="note">{{ $package->note }}</textarea>
                        </div>
                 
                        <div class="form-group">
                            <label for="exampleSelectGender">Trạng thái</label>
                            <select class="form-control" id="exampleSelectGender" name="status">
                                @if ($package->status == 1)
                                    <option selected value="{{ $package->status }}">Hoạt Động</option>
                                    <option value="{{ $package->status = 2 }}">Đã Tắt</option>
                                @else
                                    <option selected value="{{ $package->status }}">Đã Tắt</option>
                                    <option value="{{ $package->status = 1 }}">Hoạt Động</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Update </button>
                        <a href="{{ BASE_URL }}admin/packages" class="btn btn-light">Cancel</a>
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
