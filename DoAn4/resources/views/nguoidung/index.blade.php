@extends('nguoidung/layout')
@section('nguoidung/content')
<div id="Slide" class="carousel slide" data-ride="carousel" style="margin:0 auto;width:1280px;margin-top:30px">
  <ol class="carousel-indicators">
    @foreach ($Slide as $key => $item)
         <li data-target="#myCarousel" data-slide-to="{{ $key}}" class="{{ $key == 0 ? ' active' : '' }}"></li>
    @endforeach
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="background-color: white">
    @for ($i = 0; $i < count($Slide); $i++)
      <div class="item{{ $i == 0 ? ' active' : '' }}">
        <img style="width:100%;height:550px" src="/nguoidung/Images/slide/{{$Slide[$i]->Anh}}">
      </div>
    @endfor
  </div>

  <a class="left carousel-control" href="#Slide" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#Slide" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<div class="page-top">
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-12">
              <h2 class="page-heading">
                  <span class="page-heading-title">Sản phẩm mới </span>
              </h2>

              <div class="latest-deals-product">
                  <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                      data-margin="10" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                      data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                      @foreach ($sanphammoi as $item)
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
                                        <div class="label">New</div>
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
<div class="page-top">
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-12">
              <h2 class="page-heading">
                  <span class="page-heading-title">Sản phẩm bán chạy </span>
              </h2>

              <div class="latest-deals-product">
                  <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                      data-margin="10" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                      data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                      @foreach ($sanphambanchay as $item)
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
                                        <div class="label">giảm {{ $item->PhanTramGiamGia }}%</div>
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
<div class="page-top">
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-12">
              <h2 class="page-heading">
                  <span class="page-heading-title">Sản phẩm giảm giá</span>
              </h2>

              <div class="latest-deals-product">
                  <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                      data-margin="10" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                      data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                      @foreach ($sanphamgiamgia as $item)
                          <li style="height: 290px">
                              <div class="left-block">
                                  <a href="#" style="height: 180px;">
                                      <img class="img-rounded" alt="product" src="/nguoidung/Images/{{ $item->AnhDaiDien }}" />
                                  </a>
                                  <a href="/themvaogiohang/{{$item-> id}}"><input class="btn_muangay" type="button" value="MUA NGAY" onclick=" return alert('Đã thêm sản phẩm vào giỏ hàng')"/></a>
                              </div>
                              <div class="right-block">
                                  <div class="content_price">
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

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
	
@endsection 

