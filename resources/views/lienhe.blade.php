<x-onlyheader>
    @section('style')
        <style>
            .contact {
                position: relative;
            }

            .contact_heading {
                color: white;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    @endsection
    <div class="row">
        <div class="col-12 contact">
            <img src="https://bizweb.dktcdn.net/100/481/386/themes/902364/assets/banner_contact.png?1680252795531"
                alt="" class="w-100 contact_img">
            <h2 class="contact_heading">LIÊN HỆ VỚI CHÚNG TÔI</h2>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-lg-6 py-3">
            <h3>BẠN CÓ BẤT KỲ CÂU HỎI NÀO?</h3>
            <p class="text-secondary mt-2">Đối với tác giả của đất cũng không từ sự thù hận cũng không phải sự thù hận
                của trang sức. Tuy nhiên, đó không phải là vấn đề cuộc sống đối với tác giả của bóng đá trên sân.</p>
            <span class="text-secondary mt-2">Địa chỉ: Tòa nhà Ladeco, 266 Đội Cấn, Ba Đình, Hà Nội, Vietnam</span> <br>
            <span class="text-secondary">Điện thoại: 19006750</span> <br>
            <span class="text-secondary">Email: support@sapo.vn</span>
        </div>
        <div class="col-lg-6 py-3">
            <form action="{{ route('trangchu.luu_lienhe') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-3">
                            <input type="text" id="hoten" class="form-control" siez="17" name="hoten" />
                            <label class="form-label" for="hoten">Họ tên</label>
                            <x-error-message name="hoten" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-3">
                            <input type="text" id="dienthoai" class="form-control" siez="17" name="dienthoai" />
                            <label class="form-label" for="dienthoai">Số điện thoại</label>
                            <x-error-message name="dienthoai" />
                        </div>
                    </div>
                  </div>
                  <div class="form-outline mb-3">
                      <input type="text" id="email" class="form-control" siez="17" name="email" />
                      <label class="form-label" for="email">Email</label>
                      <x-error-message name="email" />
                  </div>
                  <div class="form-outline mt-3">
                      <textarea name="noidung" class="form-control" style="background: none;" rows="3"></textarea>
                      <label class="form-label" for="email">Nội dung</label>
                      <x-error-message name="noidung" />
                  </div>
                <button class="btn btn-sm btn-success mt-3">Gửi</button>
            </form>
            <x-alert message='message' color='success'/>
        </div>
    </div>
</x-onlyheader>
