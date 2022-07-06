
@extends('layout.main_client')
@section('main-content-client')



    <div class="row">
      <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0" style="margin-bottom:15px;">
        <div class="card bg-success">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Số Dư Hiện Có</p>
                <h2 class="text-white">{{number_format($user->balance)}} vnđ</h2>
              </div>
              <i class="card-icon-indicator mdi mdi-cash bg-inverse-icon-success"></i>
            </div>
         
          </div>
        </div>
      </div>

      <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
        <div class="card bg-warning">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Số tiền đã nạp</p>
                <h2 class="text-white">{{number_format($totalCoinDeposited)}}<span class="h5"> vnđ</span>
                </h2>
              </div>
              <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
        <div class="card bg-danger">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Số tiền đã dùng</p>
                <h2 class="text-white">{{number_format($totalCoinSpent)}}<span class="h5"> vnđ</span>
                </h2>
              </div>
              <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-primary">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Số đơn đã đặt</p>
                <h2 class="text-white">{{$totalOrder}}<span class="h5"> Đơn</span>
                </h2>
              </div>
              <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
            </div>
          </div>
        </div>
      </div>


      
    </div>
    <div class="col-lg-12">
      <div class="card">
          <div class="card-header border-0">
              <div class="d-flex align-items-center">
                  <h5 class="card-title mb-0 flex-grow-1">Top Nạp Tiền</h5>
              </div>
          </div>
          <div class="card-body">
              <div class="table-responsive table-card mb-4">
                  <table class="table align-middle table-nowrap mb-0">
                      <thead class="table-light text-muted">
                          <tr>
                              <th>STT</th>
                              <th>Tài Khoản</th>
                              <th>Avatar</th>
                              <th>Số Tiền</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0 ?>
                          @foreach ($topCoin as $top)
                            <?php $i++ ?>
                              <tr>
                                  <td>{{ $i}}</td>
                                  <td>{{ $top->username }}</td>
                                  <td> <img src="{{IMG_URL}}{{$top->avatar}}" alt="user" height="50px"></td>
                                  <td>{{ number_format($top->tong) }}</td>
                              </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
              <div class="d-flex justify-content-end mt-2">

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
