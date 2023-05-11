<x-onlyheader title="Tin tức">
    <h3 class="text-center">Tin Tức</h3>
    <div class="row">
        @if (count($tintuc) > 0)
            @foreach ($tintuc as $item)
                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <a href="{{ route('trangchu.tintuc.chitiet', $item->id) }}">
                            <img src="{{ asset('/storage/tintuc/' . $item->hinhanh) }}" class="card-img-top"
                                alt="Fissure in Sandstone" />
                        </a>
                        <div class="card-body px-3 py-2">
                            <span class="text-secondary"
                                style="font-size: 13px;">{{ $item->created_at->format('d/m/Y') }}</span>
                            <a href="{{ route('trangchu.tintuc.chitiet', $item->id) }}">
                                <h5 class="card-title p-0 my-2">{{ $item->tieude }}</h5>
                            </a>
                            <p class="text-truncate card-text text-secondary w-100">{{ $item->mota }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">Bài viết đang cập nhật...</p>
        @endif
    </div>
</x-onlyheader>
