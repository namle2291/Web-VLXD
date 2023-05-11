@php
    $hide_category = $attributes['hide-category'];
@endphp
<div class="row d-flex align-items-center rounded-3 overflow-hidden category">
    @if (!$hide_category)
        <div class="col-xl-3 col-4 d-none d-lg-block">
            <div class="category_header">
                <i class="fa-solid fa-paw"></i>
                <span class="ms-2">DANH MỤC SẢN PHẨM</span>
            </div>
        </div>
    @endif
    <div class="{{ !$hide_category ? 'col-xl-9' : 'col-xl-12' }} col-lg-8 col-12">
        <div>
            <ul class="nav_list">
                <li class="nav_item">
                    <a class="nav_link" href="{{ route('trangchu') }}"> Trang chủ </a>
                </li>
                <li class="nav_item">
                    <a class="nav_link" href="{{ route('trangchu.sanpham') }}">Sản phẩm</a>
                </li>
                <li class="nav_item">
                    <a class="nav_link" href="{{ route('trangchu.tintuc') }}">Tin tức</a>
                </li>
                <li class="nav_item">
                    <a class="nav_link" href="{{ route('trangchu.lienhe') }}">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>
