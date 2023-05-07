<x-onlyheader title="Giỏ hàng">
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h4 class="fw-bold mb-0 text-black">Giỏ hàng của bạn</h4>
                                            <h6 class="mb-0 text-muted">{{count($cart->items)}} sản phẩm</h6>
                                        </div>
                                        <hr class="my-4">

                                        @if (count($cart->items) > 0)
                                        @foreach ($cart->items as $item)
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="{{asset('/storage/sanpham/'.$item['hinhanh'])}}"
                                                    class="img-fluid rounded-3" alt="{{$item['tensanpham']}}">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">{{$item['danhmuc']}}</h6>
                                                <h6 class="text-black mb-0">{{$item['tensanpham']}}</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <form action="{{route('giohang.capnhat',$item['id'])}}" class="d-flex"
                                                    method="get">
                                                    <input type="number" name="quantity" value="{{$item['quantity']}}"
                                                        max="20" min="1" class="form-control w-75">
                                                    <button class="btn btn-sm btn-success"><i
                                                            class="fas fa-save"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">{{number_format($item['gia'])}} <sup>đ</sup></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="{{route('giohang.xoa',$item['id'])}}" class="text-muted"><i
                                                        class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <hr class="my-4">
                                        @endforeach
                                        @else
                                        <p class="text-danger">Chưa có sản phẩm nào trong giỏ hàng</p>
                                        @endif


                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="{{route('trangchu')}}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Về trang chủ</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">tỔNG CỘNG</h5>
                                            <h5>{{number_format($cart->get_total_price())}} <sup>đ</sup></h5>
                                        </div>

                                        <a type="button" class="btn btn-dark"
                                            href="{{route('trangchu.thanhtoan')}}">Thanh toán ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-onlyheader>