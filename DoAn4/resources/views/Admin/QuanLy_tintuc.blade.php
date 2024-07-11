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
                            <h2>Quản lý Tin Tức</small></h2>
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
                                <button class="btn btn-primary fa fa-plus" data-toggle="modal"  data-target="#exampleModal">Tạo mới</button>
                            </p>
                            @if(Session::has('thongbao'))
                                <div class="alert alert-success">
                                {{ Session::get('thongbao')}}
                                </div>
                            @endif
                            <div class="form-group pull-left">
                                <label>Tìm Kiếm : </label>
                                <label>
                                    <input type="text" class="form-control" ng-model="Search" />
                                </label>
                            </div>
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
                                        <th><a>Mã Tin Tức</a></th>
                                        <th>Tiêu Đề</th> 
                                        <th>NoiDung</th>
                                        <th>Ảnh Tin Tức</th>
                                        <th>Tên Người Dùng </th>
                                        <th colspan="3">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tintuc as $item)
                                    <tr>
                                        <td value="name">{{$item->id}}</td>
                                        <td><a href="{{ url('/QuanLy_tintuc', $item->id) }}">{{$item->TieuDe}}</a></td>
                                        <td>{{$item->NoiDung}}</td>
                                        <td>
                                            <img style="with:120px;height:50px" src="nguoidung/Images/{{$item->AnhTinTuc}}" alt="không có ảnh" />
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <form action="/tintuc_xoa/{{$item->id}}" method="POST" enctype="multipart/form-data" >
                                                <a href="/QuanLy_tintuc_update/{{$item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Cập nhật</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>                                           
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tin tức</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <form novalidate  class="form-horizontal row-border" action="/tintuc_them" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17"> Tiêu đề</label>
                                            <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="TieuDe" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Nội Dung</label>
                                            <div class="col-md-7"> <input type="" id="idTenThuongHieu" class="form-control" name="NoiDung" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">AnhDaiDien</label>
                                            <div class="col-md-7">
                                                 <input type="file" id="idTenThuongHieu" class="form-control" name="AnhTinTuc"  /> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Mã người đùng</label>
                                            <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="users_id" value="{{Auth::user()->id}}" readonly /></div>
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