@extends('Admin.layout')
@section('Admin.content')
<div class="container body">
    @include('Admin.menuleft')
    @include('Admin.menutop')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2> chi tiết Hóa đơn nhập <small></small></h2>
                            <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã HDN</th> 
                                        <th>Mã Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Giá Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongTien = 0; ?>
                                    @foreach ($cthdn as $item)
                                    <tr>
                                        <td>{{$item->hoadonnhap_id}}</td>
                                        <td>{{$item->sanpham_id}}</td>
                                        <td>{{$item->SoLuong}}</td>
                                        <td>{{$item->GiaTien}}</td>
                                    </tr>
                                    <?php $tongTien += $item->SoLuong * $item->GiaTien; ?>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" align="right"><strong>Tổng tiền:</strong></td>
                                        <td style="color: red">{{ number_format($tongTien, 0, ',', '.') }} đ</td>
                                    </tr>
                                </tbody>
                                       
                            </table>
                        </div>
                        <div class="x_content">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection