<x-admin title="Thêm sản phẩm">
    <form action="{{route('admin.sanpham.luu')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" value="{{old('tensanpham')}}" class="form-control" name="tensanpham">
                    @error('tensanpham')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Danh mục</label>
                    <select name="danhmuc_id" class="form-select">
                        <option value="" disabled selected>Chọn một danh mục</option>
                        @foreach ($danhmuc as $item)
                        <option value="{{$item->id}}">{{$item->tendanhmuc}}</option>
                        @endforeach
                    </select>
                    @error('danhmuc_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh">
                </div>
                <div class="form-group">
                    <label class="form-label">Giá</label>
                    <input type="text" value="{{old('gia')}}" class="form-control" name="gia">
                    @error('gia')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-abel">Mô tả</label>
                    <input type="text" value="{{old('mota')}}" class="form-control" name="mota">
                    @error('mota')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-sm btn-success mt-3">Thêm</button>
            </div>
        </div>
    </form>
</x-admin>