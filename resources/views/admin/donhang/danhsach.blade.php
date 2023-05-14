<x-admin title="Danh sách đơn hàng">
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-primary text-light">
            <tr>
                <th>#</th>
                <th>Khách hàng</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->ten }}</td>
                    <td>{{ $item->diachi }}</td>
                    <td>{{ $cart->format_price($item->tongtien) }}</td>
                    <td>
                        <a href="{{ route('admin.donhang.chitiet', $item->id) }}" class="btn btn-sm btn-success">Chi
                            tiết</a>
                        <a href="{{ route('admin.donhang.sua', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <a href="{{ route('admin.donhang.xoa', $item->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin>
