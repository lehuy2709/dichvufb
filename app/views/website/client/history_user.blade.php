@extends('layout.main_client')
@section('main-content-client')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Lịch sử giao dịch</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card mb-4">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th>ID</th>
                                <th>Thời gian</th>
                                <th>Giao dịch</th>
                                <th>Số tiền</th>
                                <th>Số dư cuối</th>
                                <th>Nội dung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $transaction)
                                <tr>
                                    <td>#{{ $transaction->id }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    @if ($transaction->type == 1)
                                        <td><span class="badge badge-primary">Đặt đơn</span></td>
                                    @elseif($transaction->type == 2)
                                        <td><span class="badge badge-success"> Cộng tiền</span></td>
                                    @elseif($transaction->type == 3)
                                        <td><span class="badge badge-danger">Trừ tiền</span></td>
                                    @else
                                        <td> <span class="badge badge-warning">Hoàn tiền</span></td>
                                    @endif
                                    @if ($transaction->type == 1)
                                        <td><span class="text-danger">- {{ number_format($transaction->amount) }}</span></td>
                                    @elseif($transaction->type == 2)
                                        <td><span class="text-success"> + {{ number_format($transaction->amount) }}</span></td>
                                    @elseif($transaction->type == 3)
                                        <td><span class="text-danger">- {{ number_format($transaction->amount) }}</span></td>
                                    @else
                                        <td> <span class="text-success">+ {{ number_format($transaction->amount) }}</span></td>
                                    @endif
                                    <td>{{ number_format($transaction->balance) }}đ</td>
                                    <td>{{ $transaction->description }}</td>
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
