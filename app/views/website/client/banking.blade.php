@extends('layout.main_client')
@section('main-content-client')
    <div class="row">
        <div class="col-md-12 mb-3">
            <h5 class="text-primary">Tỷ giá: 1 VNĐ = 1 coin</h5>
        </div>
        <div class="col-md-12">
            <div class="alert text-white bg-secondary mb-3" style="background: rgb(242, 97, 121) !important" role="alert">
                - Bạn vui lòng chuyển khoản chính
                xác
                nội dung để được cộng tiền nhanh nhất.<br>
                - Nếu sau 20 phút từ khi tiền trong tài khoản của bạn bị trừ mà vẫn chưa được cộng
                tiền vui liên hệ Admin để được hỗ trợ.<br>
            </div>
        </div>
        <div class="mb-3 col-sm-6">
            <h5 class="text-info text-center"><img src="{{ IMG_URL }}viettin.png" height="100px"></h5>
            <div class="alert text-white bg-success " role="alert">
                <div>
                    Số tài khoản: <b id="stk_vcb" class="text-right text-dark"
                        onclick="if (!window.__cfRLUnblockHandlers) return false; coppy('stk_vcb');">105871608693
                    </b>
                </div>
                <div>
                    Chủ tài khoản: <b class="text-right">LE VAN HUY</b>
                </div>
                <div>
                    Nạp tối thiểu: <b class="text-right">10,000 VNĐ</b>
                </div>
                <div>
                    Chú ý: <b class="text-right">Nạp tốc độ 5s -&gt; 30s, khung giờ 22h -&gt; 24h có thể
                        delay.</b>
                </div>
            </div>
        </div>
        <div class="mb-3 col-sm-6">
            <h5 class="text-info text-center"><img src="{{ IMG_URL }}momo.png" height="100px"></h5>
            <div class="alert text-white bg-success " role="alert">
                <div>
                    Số tài khoản: <b id="stk_mbb" class="text-right text-dark"
                        onclick="if (!window.__cfRLUnblockHandlers) return false; coppy('stk_mbb');">0931.391.358</b>
                </div>
                <div>
                    Chủ tài khoản: <b class="text-right">LE VAN HUY</b>
                </div>
                <div>
                    Nạp tối thiểu: <b class="text-right">10,000 VNĐ</b>
                </div>
                <div>
                    Chú ý: <b class="text-right">Nạp tốc độ 5s -&gt; 1p, hay bị delay, chậm nhất 10p-
                        1h.</b>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h5 class="text-primary">Nội dung chuyển khoản</h5>
            <div class="alert text-white bg-info mb-3" style="background-color:#6cbfff !important;" role="alert">
                <h4 class="text-white bg-heading font-weight-semi-bold text-center"><a href="javascript:;"
                        onclick="if (!window.__cfRLUnblockHandlers) return false; coppy('content_codeRecharge');"><b
                            id="content_codeRecharge" style="color: black">follownhanh (khoảng cách) tên tài khoản</b> <i class="fa fa-clone"></i></a></h4>
            </div>
        </div>
        <div class="col-md-12">
            <div class="alert text-white bg-warning mb-3" role="alert">
                <h5 class="text-white bg-heading font-weight-semi-bold">Lưu ý</h5>
                <p>
                    - Cố tình nạp dưới mức nạp không hỗ trợ <br>
                    - Nạp sai cú pháp, sai số tài khoản, sai ngân hàng sẽ bị trừ 20% phí giao dịch. Vd: nạp
                    100k sai nội
                    dung sẽ chỉ nhận được 80k coin và phải liên hệ admin để cộng tay.
                 </p>
                 <p> - Để xem số tiền đã được cộng vào hay chưa , người dùng vui lòng reload lại trang hoặc đăng nhập lại.</p>
            </div>
        </div>
    </div>
@endsection
