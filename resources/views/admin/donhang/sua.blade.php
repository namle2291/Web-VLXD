<x-admin title="Cập nhật đơn hàng">
    <form action="{{ route('admin.donhang.luu', $donhang_edit->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" value="{{ $donhang_edit->ten }}" name="ten">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Điện thoại</label>
                    <input type="text" class="form-control" value="{{ $donhang_edit->dienthoai }}" name="dienthoai">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{ $donhang_edit->diachi }}" name="diachi">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Tổng tiền</label>
                    <input type="text" class="form-control" value="{{ $donhang_edit->tongtien }}" name="tongtien">
                </div>
                <a href="{{ route('admin.donhang') }}" class="btn btn-sm btn-dark">Trở lại</a>
                <button class="btn btn-sm btn-success">Cập nhật</button>
            </div>
        </div>
    </form>
</x-admin>
