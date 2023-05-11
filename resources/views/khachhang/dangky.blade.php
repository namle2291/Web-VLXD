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
                                    <h2 class="fw-bold mb-5">Đăng ký</h2>
                                    <form method="POST" action="{{route('khachhang.luu_dangky')}}">
                                        @csrf
                                        <!-- Name input -->
                                        <div class="form-outline mb-3">
                                            <input type="text" class="form-control" name="ten" />
                                            <label class="form-label">Họ tên</label>
                                        </div>
                                        @error('ten')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror
                                        <!-- Email input -->
                                        <div class="form-outline mb-3">
                                            <input type="email" class="form-control" name="email" />
                                            <label class="form-label">Email</label>
                                        </div>
                                        @error('email')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror
                                        <!-- Address input -->
                                        <div class="form-outline mb-3">
                                            <input type="text" class="form-control" name="diachi" />
                                            <label class="form-label">Địa chỉ</label>
                                        </div>
                                        @error('diachi')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror
                                        <!-- Phone input -->
                                        <div class="form-outline mb-3">
                                            <input type="text" class="form-control" name="dienthoai" />
                                            <label class="form-label">Số điện thoại</label>
                                        </div>
                                        @error('dienthoai')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror

                                        <!-- Password input -->
                                        <div class="form-outline mb-3">
                                            <input type="password" class="form-control" name="password" />
                                            <label class="form-label">Mật khẩu</label>
                                        </div>
                                        @error('matkhau')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror
                                        <!-- Confirm Password input -->
                                        <div class="form-outline mb-3">
                                            <input type="password" class="form-control" name="nhaplaimatkhau" />
                                            <label class="form-label">Nhập lại mật khẩu</label>
                                        </div>
                                        @error('nhaplaimatkhau')
                                        <p class="text-start text-danger">{{$message}}</p>
                                        @enderror

                                        <!-- Checkbox -->
                                        <div class="form-check d-flex justify-content-center mb-4">
                                            <label class="form-check-label" for="form2Example33">
                                                Đã có tài khoản? <a href="{{route('khachhang.dangnhap')}}"
                                                    class="text-success">Đăng nhập</a>
                                            </label>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-success btn-block mb-4">
                                            Đăng ký
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <img src="https://images.unsplash.com/photo-1615461476249-718ef8bc369c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
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