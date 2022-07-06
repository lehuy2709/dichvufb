@extends('layout.main_client')
@section('main-content-client')
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

    <div class="col-lg-9">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Thông tin chi tiết đơn #{{ $order->id }}</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Dịch vụ</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-15">
                                                <i class="{{ $order->package->service->category->icon }}"></i>
                                                <a href="{{ BASE_URL }}service/{{ $order->package->service->category->slug }}/{{ $order->package->service->slug }}"
                                                    class="link-primary">
                                                    {{ $order->package->service->name }}
                                                </a>
                                            </h5>
                                            <p class="text-muted mb-0">Gói dịch vụ: <span
                                                    class="fw-medium">{{ $order->package->name }}</span></p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $order->total == 0 ? 'Miễn phí' : number_format($order->total / $order->quantity) . 'đ' }}
                                </td>
                                <td>{{ number_format($order->quantity) }}</td>
                                <td class="fw-medium">{{ number_format($order->total) }}đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="userid" value="{{$order->user->id}}">
              


                    <div class="mb-3">
                        <label class="form-label">{{ $order->package->service->lable }}</label>
                        <input type="text" class="form-control" value="{{ $order->input }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <textarea class="form-control" disabled>{{ $order->note }}</textarea>
                    </div>
          
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Đặt lúc</label>
                                <input type="text" class="form-control" value="{{ $order->created_at }}" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Cập nhật lúc</label>
                                <input type="text" class="form-control" value="{{ $order->updated_at }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="hstack gap-2 justify-content-end">
                        <a href="{{BASE_URL}}order/history" class="btn btn-light">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0">Thông tin người đặt</h5>
                    <div class="flex-shrink-0">
                        <a href="" class="link-secondary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 vstack gap-3">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{IMG_URL}}{{$order->user->avatar}}" alt="" class="avatar-sm rounded shadow" width="80px">
                            </div>
                       
                        </div>
                    </li>
                    <li><i class="mdi mdi-account"></i>{{ $order->user->username }}</li>
                    <li><i class="mdi mdi-email"></i> {{ $order->user->email }}</li>
                    <li><i class="mdi mdi-cash-usd"></i>
                        <span class="text-danger">{{ number_format($order->user->balance) }}đ</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
