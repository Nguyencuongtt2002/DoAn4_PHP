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
                            <h2>Quản lý Giới Thiệu <small></small></h2>
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
                               <a href="/QuanLy_gioithieu_create" class="btn btn-success btn-sm">
                                Thêm mới
                               </a>
                            </p>
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
                                        <th><a>Mã Giới Thiệu </a></th>
                                        <th>Tiêu đề </th> 
                                        <th>Nội Dung</th>
                                        <th>Anh</th>
                                        <th colspan="3">Thao tác</th>
                                    </tr>
                                </thead>
            
            
                                <tbody>
                                    @foreach ($gioithieu as $item)                 
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->TieuDe}}</td>
                                        <td>{{$item->NoiDung}}</td>
                                        <td>
                                            <img style="with:120px;height:50px" src="/nguoidung/Images/{{$item->Anh}}" alt="" />
                                        </td>
                                        <td>
                                            <span id="save" class="btn btn-primary glyphicon glyphicon-pencil" ng-click="getbyID(s)" data-toggle="modal" data-target="#exampleModal2">
                                            </span>
                                        </td>
                                        <td>
                                          <span id="save" class="btn btn-info glyphicon glyphicon-question-sign" ng-click="deletebyID(s)" data-toggle="modal" data-target="#detailModal">
                                          </span>
                                        </td>
                                        <td>
                                            <span id="save" class="btn btn-danger glyphicon glyphicon-trash" ></span>
                                        </td>
            
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection