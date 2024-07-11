@extends('Admin.layout')
@section('Admin.content')
<div class="container body">
    @include('Admin.menuleft')
    @include('Admin.menutop')
    <div class="right_col" role="main">
        <div class="">
            <div class="row" ng-app="myApp" ng-controller="LoaiSPAdController">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Quản lý Sản Phẩm <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#">Settings 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                <button class="btn btn-primary fa fa-plus" data-toggle="modal"data-target="#exampleModal">Tạo mới</button>
                            </p>
                            @if(Session::has('thongbao'))
                                <div class="alert alert-success">
                                {{ Session::get('thongbao')}}
                                </div>
                            @endif
                            <form method="" action="">
                                <input type="text" name="key" placeholder="Tìm kiếm...">
                                <button type="submit">Tìm kiếm</button>
                            </form>                            
                            <p style="float:right">
                                Hiển thị:
                                <label>
                                    <select class="form-control" ng-model="itemsPerPage">
                                        <option ng-value="1">1</option>
                                        <option ng-value="5">5</option>
                                        <option ng-value="10">10</option>
                                        <option ng-value="15">15</option>
                                    </select>
                                </label>
                            </p>
                            <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><a>Mã Sản phẩm </a></th>
                                        <th>Tên Sản Phẩm </th> 
                                        <th>Mô tả </th>
                                        <th>Size</th>
                                        <th>Tên loại sản phẩm </th>
                                        <th>Tên thương hiệu</th>
                                        <th>Ảnh</th>
                                        <th colspan="3">Thao tác</th>
                                    </tr>
                                </thead>
            
            
                                <tbody>
                                    @foreach ($sanpham as $item)    
                                    <tr>
                                        <td value="name">{{$item->id}}</td>
                                        <td>{{$item->TenSP}}</td>
                                        <td>{{$item->MoTa}}</td>
                                        <td>{{$item->Size}}</td>
                                        <td>{{$item->TenLoaiSanPham}}</td>
                                        <td>{{$item->TenThuongHieu}}</td>
                                        <td><img style="width:100px;height:100px" src="nguoidung/Images/{{$item->AnhDaiDien}}"/></td>
                                        <td>
                                            <form action="/sanpham_xoa/{{$item->id}}" method="POST">
                                                <a href="/QuanLy_sanpham_update/{{$item->id}}" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Cập nhật </a>   
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" onclick=" return confirm('ban co chac chan muon xoa')"><i class="fa fa-trash-o"></i> Xoá </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class=""style="margin-left:500px">{{$sanpham->appends(request()->all())->links()}}</div>
                        </div>
                    </div>
                </div>
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sản Phẩm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <form novalidate id="frmLoaiSP" class="form-horizontal row-border" action="/sanpham_them" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Tên SP</label>
                                            <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="TenSP" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Mô Tả</label>
                                            <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="MoTa"/> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Size</label>
                                            <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="Size"  /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Tên loại</label>
                                            <div class="col-md-7"> 
                                                <select class="form-control" name="loaisanpham_id">
                                                    @foreach ($loaisanpham as $id => $TenLoaiSanPham)
                                                        <option value="{{$id}}">{{$TenLoaiSanPham}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Tên TH</label>
                                            <div class="col-md-7"> 
                                                <select class="form-control" name="thuonghieu_id"> 
                                                    @foreach ($thuonghieu as $id => $TenThuongHieu)
                                                        <option value="{{$id}}">{{$TenThuongHieu}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">AnhDaiDien</label>
                                            <div class="col-md-7">
                                                 <input type="file" id="idTenThuongHieu" class="form-control" name="AnhDaiDien"  /> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4"> </div>
                                            <div class="col-md-7">
                                                <input class="btn btn-success mt-2" type="submit" value="Thêm"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
            
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection