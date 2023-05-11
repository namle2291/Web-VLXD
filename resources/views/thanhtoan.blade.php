<x-onlyheader title="Thanh toán">
    <section class="h-100 h-custom" style="background-color: #eee">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px">
                        <div class="card-body text-black">
                            <div class="row">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6 px-5 py-4">
                                    <h5 class="mb-5 pt-2 text-center fw-bold text-uppercase">
                                        Giỏ hàng
                                    </h5>

                                    @foreach ($cart->items as $item)
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('/storage/sanpham/' . $item['hinhanh']) }}"
                                                    class="img-fluid" width="80" height="80"
                                                    alt="Generic placeholder image" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <a href="{{ route('giohang.xoa', $item['id']) }}"
                                                    class="float-end text-black"><i class="fas fa-times"></i></a>
                                                <h5 class="text-primary">
                                                    {{ $item['tensanpham'] }}
                                                </h5>
                                                <h6 style="color: #9e9e9e">
                                                    Giá: {{ $item['gia'] }}
                                                </h6>
                                                <h6 style="color: #9e9e9e">
                                                    SL: {{ $item['quantity'] }}
                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr class="mb-4"
                                        style="
											height: 2px;
											background-color: #1266f1;
											opacity: 1;
										" />
                                    <div class="d-flex justify-content-between p-2 mb-2"
                                        style="background-color: #e1f5fe">
                                        <h5 class="fw-bold mb-0">Tổng cộng:</h5>
                                        <h5 class="fw-bold mb-0">
                                            {{ $cart->format_price($cart->get_total_price()) }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 px-5 py-4">
                                    <h5 class="mb-5 pt-2 text-center fw-bold text-uppercase">
                                        Thông tin giao hàng
                                    </h5>

                                    @if (count($cart->items) > 0)
                                        <form class="mb-5" method="POST"
                                            action="{{ route('trangchu.luu_thanhtoan') }}">
                                            @csrf
                                            <div class="form-outline mb-3">
                                                <input type="text" id="ten"
                                                    class="form-control form-control-lg" siez="17"
                                                    value="{{ old('ten') ?? Auth::guard('khachhang')->user()->ten }}"
                                                    name="ten" />
                                                <label class="form-label" for="ten">Tên</label>
                                            </div>
                                            @error('ten')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-outline mb-3">
                                                <input type="text" id="dienthoai"
                                                    class="form-control form-control-lg" siez="17"
                                                    value="{{ old('dienthoai') ?? Auth::guard('khachhang')->user()->dienthoai }}"
                                                    name="dienthoai" />
                                                <label class="form-label" for="dienthoai">Điện thoại</label>
                                            </div>
                                            @error('dienthoai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-outline mb-3">
                                                <input type="text" id="diachi"
                                                    class="form-control form-control-lg" siez="17"
                                                    value="{{ old('diachi') ?? Auth::guard('khachhang')->user()->diachi }}"
                                                    name="diachi" />
                                                <label class="form-label" for="diachi">Địa chỉ giao hàng</label>
                                            </div>
                                            @error('diachi')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="tinh">Tỉnh/Thành Phó</label>
                                                <select name="tinh" id="tinh" class="form-select"></select>
                                                @error('tinh')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="huyen">Quận/Huyện</label>
                                                <select name="huyen" id="huyen" class="form-select"></select>
                                                @error('huyen')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="xa">Phường/Xã</label>
                                                <select name="xa" id="xa" class="form-select"></select>
                                                @error('xa')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                                Đặt hàng
                                            </button>

                                            <h5 class="fw-bold mb-5"
                                                style="
                                            position: absolute;
                                            bottom: 0;
                                        ">
                                            </h5>
                                        </form>
                                    @endif
                                    <a href="{{ route('trangchu') }}" class="h6"><i
                                            class="fas fa-angle-left me-2"></i>về trang chủ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('script')
        <script>
            const host = "https://provinces.open-api.vn/api/";

            const callAPI = (api) => {
                fetch(api)
                    .then((res) => res.json())
                    .then((data) => {
                        renderData(data, "tinh");
                    });
            };

            callAPI(host);

            const callApiDistricts = (api) => {
                fetch(api)
                    .then((res) => {
                        return res.json();
                    })
                    .then((data) => {
                        renderData(data.districts, "huyen");
                    });
            };

            const callApiWards = (api) => {
                fetch(api)
                    .then((res) => {
                        return res.json();
                    })
                    .then((data) => {
                        renderData(data.wards, "xa");
                    });
            };

            function renderData(data, select) {
                if (data) {
                    let html = '<option value="">-Chọn-</option>';
                    data.map((item) => {
                        html += `<option value="${item.name}" data-id="${item.code}">${item.name}</option>`;
                        document.querySelector("#" + select).innerHTML = html;
                    });
                }
            }

            $("#tinh").change(() => {
                let id = $("#tinh").find(":selected").data("id");
                callApiDistricts(host + "p/" + id + "?depth=2");
            });

            $("#huyen").change(() => {
                let id = $("#huyen").find(":selected").data("id");
                callApiWards(host + "d/" + id + "?depth=2");
            });
        </script>
    @endsection
</x-onlyheader>
