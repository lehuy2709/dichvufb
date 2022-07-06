@extends('layout.main_client')
@section('main-content-client')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Đơn dịch vụ đã đặt</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card mb-4">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th>ID</th>
                                <th>Thời gian</th>
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
                                    <td>
                                        <h6 class="mb-1">
                                            <a href="" class="text-body">
                                                {{ $ord->package->service->name }}
                                            </a>
                                        </h6>
                                        <p class="text-muted mb-0">{{ $ord->package->name }}</p>
                                    </td>
                                    <td>{{ number_format($ord->total) }}đ</td>
                                    <td>{{ $ord->note }}</td>
                                    <td>
                                        @if ($ord->status == 1)
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
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Xem">
                                                <a href="{{BASE_URL}}order/detail/{{$ord->id}}" class="text-success d-inline-block" style="font-size:20px;">
                                                    <i class="mdi mdi-eye" style="color:rgb(11, 255, 80)"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
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
@endsection
