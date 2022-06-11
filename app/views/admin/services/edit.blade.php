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
                    <h4 class="card-title">Services</h4>
                    <p class="card-description">Edit Services</p>
                    <form class="forms-sample" method="POST">

                        <input type="text" class="form-control" id="exampleInputName1" name="id"
                            value="{{ $services->id }}" readonly disabled hidden />
                        <input type="text" class="form-control" id="exampleInputName1" name="slug"
                            value="{{ $services->slug }}" hidden />
                        <div class="form-group">
                            <label for="exampleSelectGender">Danh Mục</label>
                            <select class="form-control" id="exampleSelectGender" name="category_id">
                                @foreach ($categories as $cate)
                                    @if ($services->category_id == $cate->id)
                                        <option selected value="{{ $services->category_id }}">{{ $services->name_cate }}
                                        </option>
                                    @else
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tên dịch vụ</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name"
                                value="{{ $services->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Lable</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="lable"
                                value="{{ $services->lable }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Placeholder</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="placeholder"
                                value="{{ $services->placeholder }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Trạng thái</label>
                            <select class="form-control" id="exampleSelectGender" name="status">
                                @if ($services->status == 1)
                                <option selected value="{{ $services->status }}">Hoạt Động</option>
                                <option  value="{{ $services->status = 2 }}">Đã Tắt</option>
                       
                                @else
                                <option selected value="{{ $services->status }}">Đã Tắt</option>
                                <option  value="{{ $services->status = 1 }}">Hoạt Động</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                      <label for="exampleTextarea1">Mô Tả</label>
                      <textarea
                        class="form-control"
                        id="exampleTextarea1"
                        rows="4"
                        name="description"
                      >{{$services->description}}</textarea>
                    </div>
                        <button type="submit" class="btn btn-primary mr-2"> Update </button>
                        <a href="{{ BASE_URL }}admin/services" class="btn btn-light">Cancel</a>
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
