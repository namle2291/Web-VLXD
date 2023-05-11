<div class="account">
    <ul class="account_list">
        @if(Auth::guard('khachhang')->user())
        <li class="account_item">
            <a class="account_link" href="{{route('khachhang.thongtin')}}"><i class="fa-solid fa-circle-user"></i>
                {{Auth::guard('khachhang')->user()->ten}}</a>
        </li>
        <li class="account_item">
            <i class="fa-solid fa-grip-lines-vertical"></i>
        </li>
        <li class="account_item">
            <a class="account_link" href="{{route('khachhang.dangxuat')}}"><i
                    class="fas fa-sign-out-alt"></i>
                Thoát</a>
        </li>
        @else
        <li class="account_item">
            <a class="account_link" href="{{route('khachhang.dangnhap')}}"><i
                    class="fa-solid fa-circle-user"></i> Đăng nhập</a>
        </li>
        <li class="account_item">
            <i class="fa-solid fa-grip-lines-vertical"></i>
        </li>
        <li class="account_item">
            <a class="account_link" href="{{route('khachhang.dangky')}}">Đăng ký</a>
        </li>
        @endif
        <li class="account_item">
            <a class="account_link" href="{{route('trangchu.giohang')}}"><i
                    class="fas fa-bag-shopping"></i>
                <sup>[{{$cart->get_total_quantity()}}]</sup></a>
        </li>
    </ul>
</div>