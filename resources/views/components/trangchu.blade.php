<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Vật Liệu Xây Dựng</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('/assets/home/style.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        @media (min-width: 1200px) {
            .container {
                max-width: 1170px;
            }
        }

        .carousel .carousel-item {
            height: 400px;
        }

        .carousel-item img {
            position: absolute;
            object-fit: cover;
            top: 0;
            left: 0;
            min-height: 400px;
        }
    </style>
</head>

<body>
    <button class="btn_go_to_top">
        <img src="https://www.freeiconspng.com/thumbs/up-arrow-png/black-up-arrow-png-22.png" width="25"
            height="25" alt="" />
    </button>
    <div class="top d-none d-md-block">
        <div class="container">
            <div class="row p-0 d-flex align-items-center">
                <div class="col-lg-4 col-md-6 d-flex align-items-center">
                    <div>
                        <i class="fas fa-phone"></i>
                        <span>19001090</span>
                    </div>
                    <div class="ms-5">
                        <i class="far fa-envelope"></i>
                        <span>abc@gmail.com</span>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 d-flex justify-content-end">
                    <div>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="ms-3 fa-brands fa-youtube"></i>
                        <i class="ms-3 fa-brands fa-google"></i>
                        <i class="ms-3 fa-brands fa-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-3 col-4">
                    <div class="logo">
                        <img class="w-100"
                            src="https://bizweb.dktcdn.net/100/481/386/themes/902364/assets/logo.png?1680252795531"
                            alt="" />
                    </div>
                </div>
                <div class="col-xl-5 d-none d-xl-block">
                    <div class="search">
                        <form class="search_form" action="{{ route('trangchu.timkiem') }}" method="get">
                            <input type="text" name="key" class="search_input"
                                placeholder="Tìm kiếm sản phẩm..." />
                            <button class="search_btn">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-8">
                    {{-- Account --}}
                    <x-account />
                </div>
            </div>
        </div>
    </header>
    <nav>
        <div class="container">
            {{-- Nav bar --}}
            <x-navbar />
            <div class="row mt-3">
                <div class="col-lg-3 d-none d-lg-block">
                    <x-danhmuc />
                </div>
                <div class="col-lg-9 col-12">
                    {{-- Component banner --}}
                    <x-slider />
                </div>
            </div>
        </div>
    </nav>
    <section class="mt-3">
        <div class="container">
            <h4 class="text-center">Sản phẩm mới nhất</h4>
            <div class="row">
                {{ $slot }}
            </div>
        </div>
    </section>

    <div class="banner mt-4">
        <div class="container">
            <div class="row banner_image m-0">
                <img src="https://bizweb.dktcdn.net/100/481/386/themes/902364/assets/bannergachmen1_1.png?1680252795531"
                    class="w-100" alt="">
            </div>
        </div>
    </div>

    <section class="mt-4">
        <div class="container">
            <h4 class="post_heading text-center">Công Trình Đã Thi Công</h4>
            <div class="post_btn mb-2">
                <button id="post_prev_btn" class="btn btn-sm">
                    <i class="fas fa-angle-left"></i>
                </button>
                <button id="post_next_btn" class="btn btn-sm">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
            <div class="post_list">
                @if (count($tintuc) > 0)
                    @foreach ($tintuc as $item)
                        <div class="post_item">
                            <div class="row py-4">
                                <div class="col-md-7 col-12 mb-3">
                                    <div class="post_image">
                                        <img src="{{ asset('/storage/tintuc/' . $item->hinhanh) }}" class="w-100"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12 d-flex align-items-center">
                                    <div class="post_info" style="text-align: justify">
                                        <a class="post_title text-dark"
                                            href="{{ route('trangchu.tintuc.chitiet', $item->id) }}">
                                            <h5>
                                                {{ $item->tieude }}
                                            </h5>
                                        </a>
                                        <p class="post_desc text-secondary">
                                            {{ $item->mota }}
                                        </p>
                                        <a href="{{ route('trangchu.tintuc.chitiet', $item->id) }}"
                                            style="background-color: var(--main_color)"
                                            class="post_btn_detail btn btn-sm text-light">
                                            Xem thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Đang cập nhật...</p>
                @endif
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mx-0 py-5" style="background-color: #d8d8d8">
                <div class="col-12 col-md-10 col-xl-6 m-auto">
                    <div class="promotion">
                        <h3 class="text-center">Đăng Ký Nhận Khuyến Mại</h3>
                        <form action="" method="post" class="my-5 d-flex justify-content-center">
                            <div class="form-group w-100">
                                <input class="w-75 form-control" type="text" placeholder="Email của bạn..." />
                                <button class="btn btn-light mt-3">Đăng ký ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="mt-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-5 text-secondary">
                    <img src="https://bizweb.dktcdn.net/100/481/386/themes/902364/assets/logo-footer.png?1680252795531"
                        alt="" />
                    <p class="mt-3">
                        Dịch vụ khách hàng là rất quan trọng, là kết quả của sự phát triển
                    </p>
                    <span>Hotline: 19006750</span> <br />
                    <span>Email: abc@gmail.com</span>
                </div>
                <div class="col-lg-7">
                    <div class="row mt-3">
                        <div class="col-4">
                            <h5>Về Chúng Tôi</h5>
                            <ul>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Gạch</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Thiết bị phòng tắm</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Sàn gỗ</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Dự án</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Tin tức & khuyến mại</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <h5>Liên Hệ</h5>
                            <ul>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Gạch</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Thiết bị phòng tắm</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Sàn gỗ</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Dự án</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Tin tức & khuyến mại</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <h5>Hỗ Trợ Dịch Vụ</h5>
                            <ul>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Gạch</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Thiết bị phòng tắm</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Sàn gỗ</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Dự án</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Tin tức & khuyến mại</a>
                                </li>
                                <li class="mb-3">
                                    <a class="text-secondary" href="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center py-3 m-0 coppy_right">
            Coppy right &copy; 2023
        </p>
    </footer>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Slick Slider -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Index Js -->
    <script src="{{ asset('/assets/home/index.js') }}"></script>
</body>

</html>
