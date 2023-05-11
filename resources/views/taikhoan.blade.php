<x-onlyheader title="Tài khoản">
    <section style="background-color: #eee">
        <div class="container py-3">
            <div class="row">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a class="text-success" href="{{ route('trangchu') }}">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-success" href="{{ route('khachhang.thongtin') }}">Khách hàng</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Thông tin
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <label for="avatar">
                                <img style="cursor: pointer;" class="rounded-circle" width="150" height="150"
                                    src="{{ asset('/storage/avatar/' . $account->anhdaidien) }}" alt="avatar" />
                            </label>
                            <h5 class="my-3">{{$account->ten}}</h5>
                            <p class="text-muted mb-4">{{$account->diachi}}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-info btn-sm">
                                    Theo dõi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('khachhang.luu_thongtin') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="anhdaidien" id="avatar" class="d-none form-control">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Họ tên</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control text-muted mb-0" value="{{ $account->ten }}"
                                            name="ten" />

                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control text-muted mb-0" value="{{ $account->email }}"
                                            name="email">
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Điện thoại</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control text-muted mb-0" value="{{ $account->dienthoai }}"
                                            name="dienthoai">
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Địa chỉ</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control text-muted mb-0" value="{{ $account->diachi }}"
                                            name="diachi">
                                    </div>
                                </div>
                                <button class="btn btn-info mt-4 btn-sm">Cập nhập thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="card-title m-4">Đơn hàng của tôi</h6>
                        <div class="card-body">
                            @if ($order)
                                <table class="table">
                                    <thead class="bg-secondary text-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Ngày đặt</th>
                                            <th>Thông tin đặt hàng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $od)
                                            <tr>
                                                <td>{{ $od->id }}</td>
                                                <td>{{ $od->created_at }}</td>
                                                <td>
                                                    <ul style="list-style: circle;">
                                                        <li>{{ $od->khachhang->ten }}</li>
                                                        <li>{{ $od->khachhang->diachi }}</li>
                                                    </ul>
                                                </td>
                                                <td>{{ number_format($od->tongtien) }} đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">Bạn chưa có đơn hàng nào!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-onlyheader>
