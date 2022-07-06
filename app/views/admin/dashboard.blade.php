
@extends('layout.main')
@section('main-content')

<div class="row">

  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
    <div class="card bg-warning">
      <div class="card-body px-3 py-4">
        <div class="d-flex justify-content-between align-items-start">
          <div class="color-card">
            <p class="mb-0 color-card-head">Tổng số thành viên</p>
            <h2 class="text-white">{{ $totalUser}}<span class="h5"> Thành viên</span>
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
            <p class="mb-0 color-card-head">Thành viên đăng kí hôm nay</p>
            <h2 class="text-white">{{$totalUserToday}}<span class="h5"> Thành viên</span>
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

  {{-- <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
    <div class="card bg-success">
      <div class="card-body px-3 py-4">
        <div class="d-flex justify-content-between align-items-start">
          <div class="color-card">
            <p class="mb-0 color-card-head">Affiliate</p>
            <h2 class="text-white">2368</h2>
          </div>
          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
        </div>
        <h6 class="text-white">20.32% Since last month</h6>
      </div>
    </div>
  </div> --}}
  
</div>
    
@endsection
