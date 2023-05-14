<x-admin title="Sản phẩm">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover table-striped">
                <thead class="bg-primary text-light">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sanpham as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tensanpham }}</td>
                            <td>
                                <img src="{{ asset('/storage/sanpham/' . $item->hinhanh) }}" width="100" class="img-thumbnail" height="100"
                                    alt="">
                            </td>
                            <td>{{ $cart->format_price($item->gia) }}</td>
                            <td>{{ $item->danhmuc->tendanhmuc }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.sanpham.them', $item->id) }}">Sửa</a>
                                <a class="btn btn-sm btn-danger"
                                    href="{{ route('admin.sanpham.xoa', $item->id) }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
