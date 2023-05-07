<x-admin title="Danh mục">
    <div class="row">
        <div class="col-4">
            <form action="{{route('admin.danhmuc.luu',$danhmuc_edit ? $danhmuc_edit->id : '')}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" value="{{$danhmuc_edit ? $danhmuc_edit->tendanhmuc : ''}}"
                        name="tendanhmuc">
                    @error('tendanhmuc')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Ảnh</label>
                    <input type="file" class="form-control" name="hinhanh">
                </div>
                @if ($danhmuc_edit)
                <a href="{{route('admin.danhmuc')}}" class="btn btn-sm btn-dark">Trở lại</a>
                @endif
                <button class="btn btn-sm btn-success">{{$danhmuc_edit ? 'Cập nhật' : 'Thêm mới'}}</button>
            </form>
        </div>
        <div class="col-8">
            <table class="table table-bordered">
                <thead class="bg-primary text-light">
                    <tr>
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th>Ảnh</th>
                        <th>SL sản phẩm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhmuc as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->tendanhmuc}}</td>
                        <td>
                            @if ($item->hinhanh)
                            <img src="{{asset('/storage/danhmuc/'.$item->hinhanh)}}" width="50" height="50" alt="">
                            @else
                            <img src="{{asset('/storage/danhmuc/no_image.png')}}" width="50" height="50" alt="">
                            @endif
                        </td>
                        <td>{{count($item->sanpham)}}</td>
                        <td>
                            <a href="{{route('admin.danhmuc',$item->id)}}" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="{{route('admin.danhmuc.xoa',$item->id)}}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>