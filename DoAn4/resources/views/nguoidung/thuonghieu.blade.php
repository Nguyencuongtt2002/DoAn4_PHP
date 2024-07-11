@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="columns-container">
    <div class="container" id="columns">
        <div class="column col-xs-12 col-sm-3" id="left_column">
            <!-- block category -->
            <div class="block left-module">
                <p style="background-color:black ; color:#FFF" class="title_block"><span class="fa fa-pagelines"></span>Danh Mục</p>
        
                <div class="block_content">
                    <div class="layered layered-category">
                        <div class="layered-content">
                            <ul class="tree-menu">
                                <div >
                                    @foreach ($thuonghieu  as $item)
                                       <li><a href="{{route('thuonghieu',['id'=>$item->id])}}">{{$item->TenThuongHieu}}</a></li>
                                    @endforeach
                                </div>
                            </ul>
                       </div>
                    </div>
                    <!-- ./layered -->
                </div>
            </div>
        </div>   
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-sm-8">
                        <div class="latest-deals-product">
                            @foreach ($sanpham as $item)
                                <ul class="product-list ">
                                    <div>
                                        <li class="col-sm-4 product-item" style="height: 300px; list-style-type:none">
                                            <div class="left-block">
                                                <a href="#" style="height: 180px;">
                                                    <img class="img-rounded" alt="product" src="/nguoidung/Images/{{ $item->AnhDaiDien }}" />
                                                  </a>
                                                  <a href="/themvaogiohang/{{$item-> id}}"><input class="btn_muangay" type="button" value="MUA NGAY" onclick=" return alert('Đã thêm sản phẩm vào giỏ hàng')"/></a>
                                            </div>
                                           <div>
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
                                                    <span class="price product-price"><span style="color: black;">Đơn Giá:</span>{{number_format($item->DonGia, 0, ',', '.')}}đ</span>
                                                    </div>
                                                </div>
                                                </div>
                                                @endif
                                                @if($item->PhanTramGiamGia !== null)
                                                <div>
                                                <div class="label">Giảm:{{$item->PhanTramGiamGia}} %</div>
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
                                            </div>                                   
                                        </li>
                                    </div>
                                </ul>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h2 class="page-heading">
                        <span class="page-heading-title">Sản phẩm khác</span>
                    </h2>
    
                    <div class="latest-deals-product">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                            data-margin="10" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                            data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                            @foreach ($sanphamkhac as $item)
                               
                                <li style="height: 290px">
                                    <div class="left-block">
                                        <a href="#" style="height: 180px;">
                                            <img class="img-rounded" alt="product" src="/nguoidung/Images/{{ $item->AnhDaiDien }}" />
                                        </a>
                                        <a href="/themvaogiohang/{{$item-> id}}"><input class="btn_muangay" type="button" value="MUA NGAY" onclick=" return alert('Đã thêm sản phẩm vào giỏ hàng')"/></a>
                                    </div>
                                    <div class="right-block">
                                        <div class="content_price">
                                            @if($item->PhanTramGiamGia === null)
                                            <div>
                                              <div class="label">New</div>
                                              <div class="right-block">
                                                <h5 class="product-name">
                                                  <a href="/chitiet/{{ $item->id }}" style="font-size: 14px; margin-right: 30px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                                    {{ $item->TenSP }}Giảm:{{$item->PhanTramGiamGia}} %
                                                  </a>
                                                </h5>
                                                <div class="content-price">
                                                  <span class="price product-price"><span style="color: black;">Đơn Giá:</span>{{number_format($item->DonGia, 0, ',', '.')}}đ</span>
                                                </div>
                                              </div>
                                            </div>
                                            @endif
                                            @if($item->PhanTramGiamGia !== null)
                                            <div>
                                              <div class="label">Giảm:{{$item->PhanTramGiamGia}} %</div>
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
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 