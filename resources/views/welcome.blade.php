<x-trangchu>
    <div class="row">
        @foreach ($sanphammoi as $item)
        <div class="col-6 col-lg-4 col-xl-3 mb-4 mb-lg-0">
            <div class="card">
                <div class="bg-image hover-zoom">
                    <img src="{{asset('/storage/sanpham/'.$item->hinhanh)}}" class="card-img-top" alt="Laptop" />
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h5 class="mb-0">{{$item->tensanpham}}</h5>
                        <h6 class="text-dark mt-2">{{number_format($item->gia)}} <sup>đ</sup></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="small">
                            <a href="#!" class="text-muted"><span
                                    class="badge bg-info text-light">{{$item->danhmuc->tendanhmuc ?? ''}}</span></a>
                        </p>
                        <a href="{{route('giohang.them',$item->id)}}"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-trangchu>