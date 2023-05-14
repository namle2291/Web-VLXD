<x-admin title="Danh sách nhân viên">
    @if (count($nhanvien) > 0)
        <table class="table table-striped table-hover table-bordered">
            <thead class="bg-primary text-light">
                <tr>
                    <th>#</th>
                    <th>Tên nhân viên</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nhanvien as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="{{ $item->name == Auth::user()->name ? 'fw-bold text-primary' : '' }}">
                            {{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at->format('H:i:s d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.nhanvien.them', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="{{ route('admin.nhanvien.xoa', $item->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-admin>
