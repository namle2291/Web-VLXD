<x-admin title="{{ $sanpham_edit ? 'Cập nhật' : 'Thêm' }} sản phẩm">
    <form action="{{ route('admin.sanpham.luu', $sanpham_edit ? $sanpham_edit->id : '') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" value="{{ $sanpham_edit ? $sanpham_edit->tensanpham : old('tensanpham') }}"
                        class="form-control" name="tensanpham">
                    @error('tensanpham')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Danh mục</label>
                    <select name="danhmuc_id" class="form-select">
                        <option value="" disabled selected>Chọn một danh mục</option>
                        @foreach ($danhmuc as $item)
                            @if ($sanpham_edit)
                                <option {{ $sanpham_edit->danhmuc_id == $item->id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->tendanhmuc }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->tendanhmuc }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('danhmuc_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh">
                </div>
                <div class="form-group">
                    <label class="form-label">Giá</label>
                    <input type="text" value="{{ $sanpham_edit ? $sanpham_edit->gia : old('gia') }}"
                        class="form-control" name="gia">
                    @error('gia')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-abel">Mô tả</label>
                    <textarea name="mota" class="form-control" rows="3">{{ $sanpham_edit ? $sanpham_edit->mota : old('mota') }}</textarea>
                    @error('mota')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <a href="{{ route('admin.sanpham') }}" class="btn btn-sm btn-dark">Trở lại</a>
                    <button class="btn btn-sm btn-success">{{ $sanpham_edit ? 'Cập nhật' : 'Thêm' }}</button>
                </div>
            </div>
        </div>
    </form>
</x-admin>
