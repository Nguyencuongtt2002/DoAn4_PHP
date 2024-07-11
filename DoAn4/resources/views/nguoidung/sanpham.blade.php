@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="page-top">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
      
            <div class="latest-deals-product">
                <ul class="product-list">
                    @if (count($sanphamtimkiem) > 0)
                        @foreach ($sanphamtimkiem as $item)
                            <li class="col-sm-4 product-item" style="height: 300px;">
                                <div class="left-block">
                                <a href="#" style="height: 180px;">
                                    <img class="img-rounded" alt="product" src="nguoidung/Images/{{ $item->AnhDaiDien }}" />
                                </a>
                                <a href="/themvaogiohang/{{$item-> id}}"><input class="btn_muangay" type="button" value="MUA NGAY" onclick=" return alert('Đã thêm sản phẩm vào giỏ hàng')"/></a>
                                </div>
                                @if($item->PhanTramGiamGia === null)
                                <div>
                                <div class="label">New</div>
                                <div class="right-block">
                                    <h5 class="product-name">
                                    <a href="/chitiet/{{ $item->id }}" style="font-size: 14px; margin-right: 30px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                        {{ $item->TenSP }}
                                    </a>
                                    </h5>
                                    <div class="content-price">
                                    <span class="price product-price"><span style="color: black;"> Giá:</span>{{number_format($item->DonGia, 0, ',', '.')}}đ</span>
                                    </div>
                                </div>
                                </div>
                                @endif
                                @if($item->PhanTramGiamGia !== null)
                                <div>
                                <div class="label">Giảm:{{$item->PhanTramGiamGia}}%</div>
                                <div class="right-block">
                                    <h5 class="product-name">
                                    <a href="/chitiet/{{ $item->id }}" style="font-size: 14px; margin-right: 30px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                        {{ $item->TenSP }}
                                    </a>
                                    </h5>
                                    <div class="content-price">
                                    <s style="display: block;">Giá cũ: {{number_format($item->GiaCu, 0, ',', '.')}}đ</s>
                                    <span class="price product-price"><span style="color: black;">Giá Mới:</span>{{number_format($item->DonGia, 0, ',', '.')}}đ</span>
                                    </div>
                                </div>
                                </div>
                                @endif
                            </li>
                        @endforeach
                    @else
                        <p style="margin:400px;font-size:24px;color:red">Không tìm thấy sản phẩm nào.</p>
                    @endif
                </ul>                
            </div>
          </div>
        </div>
      </div>
</div>      

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
	
@endsection 

