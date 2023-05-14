<x-admin title="Chi tiết đơn hàng">
    <a href="{{ route('admin.donhang.in', $donhang_id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i> In đơn
        hàng</a>
    <table class="table table-bordered table-striped table-hover mt-3">
        <thead class="bg-primary text-light">
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ctdh as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td class="d-flex align-items-center">
                        <img width="50" class="rounded-2"
                            src="{{ asset('/storage/sanpham/' . $item->sanpham->hinhanh) }}"
                            alt="{{ $item->tensanpham }}">
                        <span class="ms-2">{{ $item->sanpham->tensanpham }}</span>
                    </td>
                    <td>{{ $cart->format_price($item->gia) }}</td>
                    <td>{{ $item->soluong }}</td>
                    <td>
                        <a href="{{ route('admin.chitietdonhang.xoa', $item->id) }}"
                            class="btn btn-sm btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin>
