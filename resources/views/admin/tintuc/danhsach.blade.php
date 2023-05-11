<x-admin title="Danh sách tin tức">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Ngày đăng</th>
                <th>Người đăng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if ($tintuc)
                @foreach ($tintuc as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="w-25">{{ $item->tieude }}</td>
                        <td>
                            <img src="{{ asset('/storage/tintuc/' . $item->hinhanh) }}" width="160"
                                alt="{{$item->tieude}}">
                        </td>
                        <td>{{ $item->created_at->format('H:i:s - d/m/Y') }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                          <a href="" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</x-admin>
