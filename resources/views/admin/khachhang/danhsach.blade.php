<x-admin title="Danh sách khách hàng">
    @if (count($khachhang) > 0)
        <table class="table table-striped table-hover table-bordered">
            <thead class="bg-primary text-light">
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->ten }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->diachi }}</td>
                        <td>0{{ $item->dienthoai }}</td>
                        <td>
                            <a href="{{ route('admin.khachhang.them', $item->id) }}"
                                class="btn btn-sm btn-warning">Sửa</a>
                            <a href="{{ route('admin.khachhang.xoa', $item->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-admin>
