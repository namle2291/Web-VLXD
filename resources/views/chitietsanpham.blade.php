<x-onlyheader title="Chi tiết sản phẩm">
    <div class="row py-3 d-flex align-items-center">
        <div class="col-lg-5">
            <img src="{{ asset('/storage/sanpham/' . $product->hinhanh) }}" class="img-thumbnail" alt="">
        </div>
        <div class="col-lg-7">
            <h3>{{ $product->tensanpham }}</h3>
            <h6>{{ $cart->format_price($product->gia) }}</h6>
            <p class="mt-3">{{ $product->mota }}</p>
            <form action="{{ route('giohang.them', $product->id) }}" method="GET">
                <input class="form-control w-25 d-inline" name="quantity" type="number" min="1" value="1">
                <button class="btn btn-sm btn-dark">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center">Sản phẩm liên quan</h3>
        @foreach ($related_product as $item)
            <div class="col-6 col-lg-4 col-xl-3 mb-4 mb-lg-0">
                <div class="card">
                    <div class="bg-image hover-zoom">
                        <a href="{{ route('trangchu.chitietsanpham', $item->id) }}">
                            <img src="{{ asset('/storage/sanpham/' . $item->hinhanh) }}" class="card-img-top"
                                alt="Laptop" />
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <h5 class="mb-0"><a
                                    href="{{ route('trangchu.chitietsanpham', $item->id) }}">{{ $item->tensanpham }}</a>
                            </h5>
                            <h6 class="text-dark mt-2">{{ number_format($item->gia) }} <sup>đ</sup></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small">
                                <a href="#!" class="text-muted"><span
                                        class="badge bg-info text-light">{{ $item->danhmuc->tendanhmuc ?? '' }}</span></a>
                            </p>
                            <a href="{{ route('giohang.them', $item->id) }}"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-onlyheader>
