<div id="slider" class="carousel carousel slide d-none d-md-block" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($banner as $key => $item)
            @if ($key == 0)
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="{{ asset('/storage/banner/' . $item->hinhanh) }}" class="d-block w-100"
                        alt="{{ $key }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $item->tieude ? $item->tieude : '' }}</h5>
                        <p>{{ $item->mota ? $item->mota : '' }}</p>
                    </div>
                </div>
            @else
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('/storage/banner/' . $item->hinhanh) }}" class="d-block w-100"
                        alt="{{ $key }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $item->tieude ? $item->tieude : '' }}</h5>
                        <p>{{ $item->mota ? $item->mota : '' }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
