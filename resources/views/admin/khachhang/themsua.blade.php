<x-admin title="{{ $khachhang_edit ? 'Cập nhật' : 'Thêm' }} khách hàng">
    <form action="{{ route('admin.khachhang.luu', $khachhang_edit ? $khachhang_edit->id : '') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" name="ten"
                        value="{{ $khachhang_edit ? $khachhang_edit->ten : old('ten') }}">
                    <x-error-message name="ten" />
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email"
                        value="{{ $khachhang_edit ? $khachhang_edit->email : old('email') }}">
                    <x-error-message name="email" />
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="dienthoai"
                        value="{{ $khachhang_edit ? $khachhang_edit->dienthoai : old('dienthoai') }}">
                    <x-error-message name="dienthoai" />
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi"
                        value="{{ $khachhang_edit ? $khachhang_edit->diachi : old('diachi') }}">
                    <x-error-message name="diachi" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password">
                    <x-error-message name="password" />
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="confirm_password">
                    <x-error-message name="confirm_password" />
                </div>
                <a href="{{ route('admin.khachhang') }}" class="btn btn-sm btn-dark">Trở lại</a>
                <button class="btn btn-sm btn-success">{{ $khachhang_edit ? 'Cập nhật' : 'Thêm' }}</button>
            </div>
        </div>
    </form>
</x-admin>
