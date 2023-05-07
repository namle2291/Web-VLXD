<x-onlyheader title="Đăng nhập">
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }
        </style>

        <!-- Jumbotron -->
        <div class="container">
            <div class="row">
                <div class="col-10 m-auto">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card cascading-right" style="
                          background: hsla(0, 0%, 100%, 0.363);
                          backdrop-filter: blur(30px);
                          ">
                                <div class="card-body p-5 shadow-5 text-center">
                                    <h2 class="fw-bold mb-5">Đăng nhập</h2>
                                    <form method="POST" action="{{route('khachhang.luu_dangnhap')}}">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-3">
                                            <input type="email" name="email" class="form-control" />
                                            <label class="form-label">Email</label>
                                        </div>
                                        @error('email')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror

                                        <!-- Password input -->
                                        <div class="form-outline mb-3">
                                            <input type="password" name="password" class="form-control" />
                                            <label class="form-label">Mật khẩu</label>
                                        </div>
                                        @error('matkhau')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror

                                        <!-- Checkbox -->
                                        <div class="form-check d-flex justify-content-center mb-4">
                                            <label class="form-check-label" for="form2Example33">
                                                Chưa có tài khoản? <a href="{{route('khachhang.dangky')}}"
                                                    class="text-success">Đăng ký</a>
                                            </label>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-success btn-block mb-4">
                                            Đăng nhập
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <img src="https://e1.pxfuel.com/desktop-wallpaper/507/61/desktop-wallpaper-best-10-construction-hq-bangkok-high-building.jpg"
                                class="w-100 rounded-4 shadow-4" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
</x-onlyheader>