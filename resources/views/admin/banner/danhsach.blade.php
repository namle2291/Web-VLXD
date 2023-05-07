<x-admin title="Danh sách banner">
    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.banner.luu',$banner_edit ? $banner_edit->id : '')}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Tiêu đề</label>
                    <input value="{{$banner_edit ? $banner_edit->tieude : ''}}" type="text" name="tieude"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="hinhanh" class="form-control">
                    @error('hinhanh')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tiêu đề</label>
                    <textarea name="mota" rows="3"
                        class="form-control">{{$banner_edit ? $banner_edit->mota : ''}}</textarea>
                </div>
                @if ($banner_edit)
                <a href="{{route('admin.banner')}}" class="btn btn-sm btn-dark mb-3">Trở lại</a>
                @endif
                <button class="mb-3 btn btn-sm btn-success">{{$banner_edit ? 'Cập nhật' : 'Thêm mới'}}</button>
            </form>
        </div>
        <div class="col-12">
            <table class="table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @foreach ($banner as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->tieude}}</td>
                        <td>
                            <img src="{{asset('/storage/banner/'.$item->hinhanh)}}" width="150" alt="">
                        </td>
                        <td>{{$item->mota}}</td>
                        <td>
                            <a href="{{route('admin.banner',$item->id)}}" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="{{route('admin.banner.xoa',$item->id)}}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
</x-admin>