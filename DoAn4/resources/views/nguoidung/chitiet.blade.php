@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- row -->
        <div class="column col-xs-12 col-sm-3" id="left_column">
            <!-- block category -->
            <div class="block left-module">
                <p style="background-color:black ; color:#FFF" class="title_block"><span class="fa fa-pagelines"></span>Danh Mục</p>
        
                <div class="block_content">
                    <div class="layered layered-category">
                        <div class="layered-content">
                            <ul class="tree-menu">
                                <div >
                                    @foreach ($loaisanpham  as $item)
                                       <li><a href="{{route('danhmucsp',['id'=>$item->id])}}">{{$item->TenLoaiSanPham}}</a></li>
                                    @endforeach
                                </div>
                            </ul>
                       </div>
                    </div>
                    <!-- ./layered -->
                </div>
            </div>
        </div>   
        <!-- ./left colunm -->
        <!-- Center colunm-->
        <div class="row" id="renderSearch">
            <div class="col-sm-4 " data-aos="flip-right">
                <a href="~/Images/" data-lightbox="listImg">
                    <img src="/nguoidung/Images/{{$ct->AnhDaiDien}}" class="img-fluid" style="width:350px;height:430px" />
                </a>
            </div>
            <div class="col-md-3">
                <form action="/themvaogiohangchitiet/{{{$ct->id}}}">
                    <h2 style="font-size:14px;margin-right: 30px;white-space:nowrap;text-overflow: ellipsis;overflow: hidden;">Tên Sản Phẩm : {{$ct->TenSP}}</h2>
                    <span>số lượng:</span>
                    <input style="width: 50px" class="soluong" min="1" type="number" value="1" name="number" max="{{$tongSoLuong}}">                    
                    <h4 style="font-weight: 400" class="pb-3" data-aos="fade-left">Giá: <span class="text-danger">{{number_format($ct->DonGia, 0, ',', '.')}} VNĐ</span></h4>
                    <a>
                        <button type="submit" class="btnStyle btn1 mr-3" data-aos="fade-left" data-aos-duration="1000" onclick="<?php if ($ct->SoLuong > 0) { echo "alert('Đã thêm sản phẩm vào giỏ hàng')"; } ?>">
                            <?php if ($ct->SoLuong > 0): ?>
                                THÊM VÀO GIỎ
                            <?php else: ?>
                                HẾT HÀNG
                            <?php endif; ?>
                        </button>
                    </a>
                    <button class="btnStyle btn2" data-aos="fade-left" data-aos-duration="1000"><a href="" class="text-white" style="text-decoration: none">XEM THÊM SẢN PHẨM</a></button>
                    <br />
                    <br />
                    <hr />
                    <p data-aos="fade-left" data-aos-duration="1000">Mã sản phẩm:{{$ct->id}}</p>
                    <hr />
                </form>
            </div>            
            <div class="product-tab" style="margin-left:290px">
                <ul class="nav-tab" style="margin-bottom: 0px;">
                    <li class="active">
                        <a aria-expanded="false" data-toggle="tab" href="#product-detail">Chi tiết</a>
                    </li>
                    <li>
                        <a aria-expanded="true" data-toggle="tab" href="#comment">Bình luận</a>
                    </li>

                </ul>
                <div class="tab-container">
                    <div id="product-detail" class="tab-panel active">
                        <p>
                            {{$ct->MoTa}}
                        </p>
                    </div>
                    <div id="comment" class="tab-panel">
                        <div class="fb-comments" data-href="https://www.facebook.com/hungdng.92"
                             data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <h2>Thông Số sản phẩm</h2>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tên thông số</th>
                      <th>Mô tả</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($thongSoSanPham as $ts)
                        <tr>
                            <td>{{$ts->TenThongSo}}</td>
                            <td>{{$ts->MoTaThongTin}}</td>
                        </tr>    
                    @endforeach
                </tbody>               
                </table>
              </div>
        </div>
        
    </div>
</div>
@endsection 

