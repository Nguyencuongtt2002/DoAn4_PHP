@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title">Giỏ Hàng</span>
        </h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
         @endif
        <!-- ../page heading-->
        <div class="page-content page-order">
            <div class="heading-counter warning" ><span class="fa fa-shopping-cart"></span> Số lượng sản phẩm : @php
                $tongsoluong = 0;
                if(session()->has('giohang')){
                    foreach(session('giohang') as $sp){
                        $tongsoluong += $sp['soluong'];
                    }
                }
                echo $tongsoluong;
            @endphp
                <span id="count-cart" style="font-weight: bold"></span> <span>sản phẩm</span>
            </div>
            <div class="order-detail-content">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th class="cart_product">Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Tiền</th>
                        <th>Số lượng</th>
                        <th>Tổng Tiền</th>
                        <th class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                    </thead>
                    <tbody id="show-item-cart">
                        @if (session('giohang') && count(session('giohang')) > 0)
                            @foreach (session('giohang') as $id =>$sp)
                                <tr>
                                    <td class='cart_description'>
                                        <p class='product-name'><a href='#'>{{ $loop->iteration }} </a></p>
                                        <br>
                                    </td>
                                    <td class='cart_product'>
                                        <a href='#'><img src="/nguoidung/Images/{{ $sp['anh'] }}" alt='Product'></a>
                                    </td>
                                    <td class='cart_description'>
                                        <p class='product-name'><a href='#'>{{ $sp['tensp'] }} </a></p>
                                        <br>
                                    </td>
                                    <td class='price'><span style='color: #e84d1c; font-size: 18px; font-weight: bold;'>{{ number_format($sp['gia']) }} VNĐ</span></td>                            <td class='qty'>
                                        <input class='form-control input-sm' type='text' readonly  value='{{ $sp['soluong'] }}' >
                                        <a class='plus'href="/tangsoluong/{{ $sp['id'] }}" ><i class='fa fa-caret-up' ></i></a>
                                        <a class='minus 'href="/giamsoluong/{{ $sp['id'] }}"><i class='fa fa-caret-down'></i></a>
                                    </td>
                                    <td class='price'>
                                        <span style='color: #e84d1c; font-size: 18px; font-weight: bold;'>{{ number_format($sp['gia'] * $sp['soluong']) }} VNĐ</span>
                                    </td>
                                    <td class='action'>
                                    <a class='remove_product' href="/xoasanphamgiohang/{{ $sp['id'] }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="text-align: center; font-size: 20px;">Không có sản phẩm trong giỏ hàng</td>
                                </tr>
                        @endif
                       
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" rowspan="1"></td>
                        <td colspan="3"><strong>Tổng Tiền :</strong></td>
                        <td colspan="1" id="total_price" style="font-weight: bold; color: #e84d1c; font-size: 20px;">
                        @php
                            $tonggiatien = 0;
                            if(session()->has('giohang')){
                                foreach(session('giohang') as $sp){
                                    $tonggiatien += $sp['soluong'] * $sp['gia'];
                                }
                            }
                            echo number_format($tonggiatien);
                        @endphp VNĐ</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="cart_navigation">
                    <a class="prev-btn" href="/sanpham">tiếp tục mua hàng </a>
                    <a class="btn btn-danger delete-btn" style="margin-left: 350px;" href="/xoatatca">Xóa tất cả </a>
                    <a class="next-btn" href="/dathang">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection 

