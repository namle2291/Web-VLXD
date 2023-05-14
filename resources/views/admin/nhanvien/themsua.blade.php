<x-admin title="{{ $nhanvien_edit ? 'Cập nhật' : 'Thêm' }} nhân viên">
    <form action="{{ route('admin.nhanvien.luu', $nhanvien_edit ? $nhanvien_edit->id : '') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="form-label">Tên nhân viên</label>
                    <input type="text" class="form-control" name="name"
                        value="{{ $nhanvien_edit ? $nhanvien_edit->name : old('name') }}">
                    <x-error-message name="name" />
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email"
                        value="{{ $nhanvien_edit ? $nhanvien_edit->email : old('email') }}">
                    <x-error-message name="email" />
                </div>
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
                <a href="{{ route('admin.nhanvien') }}" class="btn btn-sm btn-dark">Trở lại</a>
                <button class="btn btn-sm btn-success">{{ $nhanvien_edit ? 'Cập nhật' : 'Thêm' }}</button>
            </div>
        </div>
    </form>
</x-admin>
