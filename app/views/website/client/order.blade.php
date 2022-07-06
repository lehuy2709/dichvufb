@extends('layout.main_client')
@section('main-content-client')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tạo đơn <span class="fw-bold">{{ $service->name }}</span> - <span
                        class="fw-bold">{{ $service->category->name }}</span></h5>
            </div>
            <div class="card-body">
                <form method="post" id="insert_form">

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="" class="form-label">{{ $service->lable }}</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="input" name="input"
                                placeholder="{{ $service->placeholder }}" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label class="form-label">Gói dịch vụ</label>
                        </div>

                        <div class="col-lg-9">
                            @foreach ($service->packages()->get() as $package)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="package_id" id="package_id"
                                        value="{{ $package->id }}">
                                    <label class="form-check-label" for="">
                                        {{ $package->name }}
                                        <span class="badge badge-label bg-secondary"
                                            style="background-color: #00cccd !important; color:white;">
                                            @if ($package->price > 0)
                                                <i class="bx bx-dollar"></i>
                                                <span id="price_rate">{{ number_format($package->price) }}</span>đ
                                            @else
                                                Miễn phí
                                            @endif
                                        </span>
                                    </label>
                                </div>

                            
                            @endforeach

                        </div>
                        <div class="col-md-12">
                            <div class="alert text-white bg-secondary mb-3" style="background: rgb(242, 97, 121) !important; display:none" role="alert" id="shownote"></div>
                        </div>

                     

                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Nhập số lượng cần mua" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="note" class="form-label">Ghi Chú</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea class="form-control" id="note" name="note" placeholder="Nhập ghi chú"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check card-radio" style="min-width:105px;">

                            <label class="form-check-label"
                                style="border-color: #4b38b3!important;border: 1px solid rgba(0,0,0,.125); margin-left:0; padding:0 10px;">
                                <span class="fs-14 mb-1 text-wrap d-block">Tổng thanh toán: <span
                                        id="total">{{ 0 }}đ</span> </span>
                                <span class="text-muted fw-normal text-wrap d-block">Số dư của bạn: <span
                                        class="fw-bold text-danger" id="sodu">{{ number_format($user->balance) }}</span>đ</span>
                            </label>
                            <input type="radio" class="form-check-input" checked style=" left: 100%;
                                                            position: absolute;
                                                            top: 5%;">
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">
                            <i class="fas fa-plus mr-1"></i> Tạo đơn hàng
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Ghi Chú</h5>
            </div>
            <div class="card-body">
                {!! $service->description !!}
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {



            let quantityInput = $('#quantity');
            let total = 0;
            let price = 0;
            let quantity = quantityInput.val();

            $('input[name="package_id"]').change(function() {
                let id = $(this).val();
                $.ajax({
                    url: '{{ BASE_URL }}service/get-package-price/',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        var result = JSON.parse(data)
                        price = result.price;
                       min_quantity = parseInt(result.min_quantity);
                        max_quantity = parseInt(result.max_quantity);
                        idNew = result.id
                        total = price * quantity;
                        $('#shownote').css('display','block')
                        $('#shownote').text(result.note)
                        $('#total').text(formatPrice(total));
                    }
                });
            });
            quantityInput.on('input', function() {
                quantity = $(this).val();
                total = price * quantity;
                $('#total').text(formatPrice(total));
            });

            $('#insert_form').submit(function(e) {
                e.preventDefault()
                let input = $('#input').val()
                let note = $('#note').val()
                let balance = $('#sodu').text()
                if (balance < total || balance < '0') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Số dư của bạn không đủ để thực hiện',

                    })
                    return false
                }
                if (input == "" || input == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Link không hợp lệ hoặc trống',

                    })
                    return false
                } else if ($('input[name="package_id"]:checked').length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vui lòng chọn gói dịch vụ',

                    })
                    return false;
                } else {
                    if (quantity == 0 || quantity == "" || quantity < 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Số lượng bạn nhập không hợp lệ',

                        })
                        return false
                    } else if (quantity > max_quantity) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Giới hạn số lượng của gói này chỉ tối đa là : ' + max_quantity,

                        })
                        return false
                    } else if (quantity < min_quantity) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Số lượng mua tối thiểu là : ' + min_quantity,
                        })
                        return false
                    } else {
                        $.ajax({
                            url: '{{ BASE_URL }}service/{{ $category->slug }}/{{ $service->slug }}',
                            method: 'POST',
                            data: {
                                id: idNew,
                                quantity: quantity,
                                total: total,
                                input: input,
                                note: note
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Tạo đơn hàng thành công',
                                    showConfirmButton: false,
                                    timer: 700
                                })
                                setTimeout((function() {
                                    window.location.reload();
                                }), 1000);
                            }
                        })
                    }

                }

            })







        });




        const formatPrice = (price) => {
            return price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + 'VNĐ';
        }
    </script>
@endsection
