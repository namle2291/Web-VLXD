<x-admin title="{{$tintuc_edit ? 'Cập nhật' : 'Thêm'}} tin tức">
    <form action="{{route('admin.tintuc.luu',$tintuc_edit ? $tintuc_edit->id : '')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="form-label">
                        Tiêu đề
                    </label>
                    <input type="text" class="form-control" value="{{$tintuc_edit ? $tintuc_edit->tieude : ''}}" name="tieude">
                    <x-error-message name="tieude"/>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">
                        Hình ảnh
                    </label>
                    <input type="file" class="form-control" name="hinhanh">
                    <x-error-message name="hinhanh"/>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">
                        Mô tả
                    </label>
                    <textarea type="text" class="form-control" rows="4" name="mota">{{$tintuc_edit ? $tintuc_edit->mota : ''}}</textarea>
                    <x-error-message name="mota"/>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">
                    Nội dung
                </label>
                <textarea name="noidung" id="editor1" rows="4">{{$tintuc_edit ? $tintuc_edit->noidung : ''}}</textarea>
                <x-error-message name="noidung"/>
                <a href="{{route('admin.tintuc')}}" class="btn btn-sm btn-dark mt-3">Trở lại</a>
                <button class="btn btn-sm btn-success mt-3">{{$tintuc_edit ? 'Cập nhật' : 'Thêm'}}</button>
            </div>
        </div>
    </form>
</x-admin>
