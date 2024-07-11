@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- page heading-->

        <h2 class="page-heading">
            <span class="page-heading-title">Thanh toán </span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">


                <!-- BEGIN PAYMENT ADDRESS -->
                <div id="payment-address" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                                Step 1: Your Personal Details
                            </a>
                        </h2>
                    </div>
                    <form action="{{route('thanhtoan')}}" method="POST">
                        @csrf
                        <div id="payment-address-content" class="panel-collapse collapse in">
                            <div class="panel-body row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Họ Tên<span class="require">:</span></label>
                                        <input type="text"  id="firstname" class="input form-control" name="TenKhachHang" value="{{auth()->user()->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Phone <span class="require">:</span></label>
                                        <input type="text" id="email" class="input form-control" name="SoDienThoai" value="{{auth()->user()->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="telephone">Số Lượng  <span class="require">:</span></label>
                                        <label> @php
                                            $tongsoluong = 0;
                                            if(session()->has('giohang')){
                                                foreach(session('giohang') as $sp){
                                                    $tongsoluong += $sp['soluong'];
                                                }
                                            }
                                            echo $tongsoluong;
                                        @endphp</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Tổng tiền <span class="require">:</span></label>
                                        <label>@php
                                            $tonggiatien = 0;
                                            if(session()->has('giohang')){
                                                foreach(session('giohang') as $sp){
                                                    $tonggiatien += $sp['soluong'] * $sp['gia'];
                                                }
                                            }
                                            echo number_format($tonggiatien);
                                        @endphp  VNĐ</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="require">:</span></label>
                                        <input type="text" id="email" class="input form-control" name="Email" value="{{auth()->user()->email}}">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="cart_navigation">
                            <a class="prev-btn" href="/sanpham">Tiếp tục mua sắm</a>
                            <input style="float:right" type="submit" onclick=" return alert('Thanh toán thành công  .Cảm ơn quý khách đã mua hàng !')" value="Thanh Toán "  />
                        </div>
                    </form>
                </div>
                
                <!-- END CONFIRM -->
            </div>

        </div>
    </div>
</div>
@endsection 

