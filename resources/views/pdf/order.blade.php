<!DOCTYPE html>
<html>

<head>
    <title>In hóa đơn</title>
    <style>
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .ngayban {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 20px 0;
        }

        .leaders li {
            padding: 5px;
            border-bottom: 1px dotted;
        }


        body {
            font-family: DejaVu Sans;
        }

        #hoadon {
            margin: 10px 0;
            border-collapse: collapse;
            width: 100%;
        }

        #hoadon td,
        #hoadon th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #hoadon tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #hoadon tr:hover {
            background-color: #ddd;
        }

        #hoadon th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h3 style="text-align: center">Hóa đơn thanh toán</h3>
    <ul class="leaders">
        <li><span>Mã hóa đơn: HD00{{ number_format($ctdh->first()->donhang->id) }}</span></li>
        <li class="leader_item"><span>Tên khách hàng:</span></li>
        <li class="leader_item"><span>Địa chỉ:</span></li>
    </ul>
    <table id="hoadon">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        @if ($ctdh)
            @php
                $i = 1;
            @endphp
            @foreach ($ctdh as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->sanpham->tensanpham }}</td>
                    <td>{{ number_format($item->gia) }}</td>
                    <td>{{ $item->soluong }}</td>
                    <td>{{ number_format($item->gia * $item->soluong) }} đ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" id="total">Tổng cộng</td>
                <td>{{ number_format($ctdh->first()->donhang->tongtien) }} đ</td>
            </tr>
        @endif
    </table>
    <div class="ngayban">
        <div style="float: left;">Khách hàng</div>
        <div style="float: right; text-align: center;">
            <i>Ngày.... tháng.... năm....</i> <br>
            <span>Người bán hàng</span>
        </div>
    </div>
</body>
