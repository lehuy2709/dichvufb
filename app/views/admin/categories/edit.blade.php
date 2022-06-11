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
                  <h4 class="card-title">Categories</h4>
                  <p class="card-description">Edit Categories</p>
                  <form class="forms-sample" method="POST">

                        <input type="text" class="form-control" id="exampleInputName1" name="id" value="{{$category->id}}" readonly disabled hidden />
                        <input type="text" class="form-control" id="exampleInputName1" name="slug" value="{{$category->slug}}"hidden />
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$category->name}}" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Icon</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="icon"  value="{{$category->icon}}" />
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                      <select class="form-control" id="exampleSelectGender" name="status">
                        <option selected  value="{{$category->status}}">{{($category->status == 1 ) ? "Hoạt Động" : "Đã Tắt"}}</option>
                        <option value="1">Hoạt Động </option>
                        <option value="2">Đã Tắt</option>
                      </select>
                    </div>
                    {{-- <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default" />
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" />
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                        </span>
                      </div>
                    </div> --}}
                    {{-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea
                        class="form-control"
                        id="exampleTextarea1"
                        rows="4"
                      ></textarea>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2"> Update </button>
                    <a href="{{BASE_URL}}admin/categories" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_SESSION['error'])){
		echo "<script type='text/javascript'>

		Swal.fire({
  		icon: 'error',
  		title: 'Có lỗi xảy ra',
 		 text: '{$_SESSION['error']}',
			})
    </script>";
		unset($_SESSION['error']);
	}
	else {
		unset($_SESSION['error']);
	}

?>

@endsection
