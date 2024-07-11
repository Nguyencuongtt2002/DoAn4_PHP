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
                            <h2>Quản lý Slide<small></small></h2>
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
                                <button class="btn btn-primary fa fa-plus" data-toggle="modal" ng-click="taomoi()" data-target="#exampleModal">Tạo mới</button>
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
                                        <th><a>Mã Slide</a></th>
                                        <th>Ảnh</th> 
                                        <th colspan="3">Thao tác</th>
                                    </tr>
                                </thead>
            
            
                                <tbody>
            
                                    <tr ng-repeat="s in listdata|orderBy:SapXep |filter:Search| limitTo:itemsPerPage: (currentPage - 1 ) * itemsPerPage">
                                        <td value="name">1</td>
                                        <td>2</td>
                                        <td>
                                            <span id="save" class="btn btn-primary glyphicon glyphicon-pencil" ng-click="getbyID(s)" data-toggle="modal" data-target="#exampleModal">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Slide </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <form novalidate name="frmLoaiSP" id="frmLoaiSP" class="form-horizontal row-border">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17"> Mã Slide </label>
                                            <div class="col-md-7"> <input type="text" id="idMaThuongHieu" class="form-control" name="nameMaSP" ng-model="MaLoaiSP"/> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17"> Ảnh </label>
                                            <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="nameTenSP" ng-model="TenLoaiSP" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4"> </div>
                                            <div class="col-md-7">
                                                <span id="save" class="btn btn-success margin-right-btn" ng-click="CreateUpdate()">
                                                    <i class="icon-save"></i> 
                                                </span>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Slide</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <form novalidate name="frmLoaiSP" id="frmLoaiSP" class="form-horizontal row-border">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17"> Mã Slide</label>
                                            <div class="col-md-7"> <input type="text" id="idMaLoai" class="form-control" name="nameMaLoai" ng-model="MaLoaiSP" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="input17">Ảnh</label>
                                            <div class="col-md-7"> <input type="text" id="idTenLoai" class="form-control" name="nameTenLoai" ng-model="TenLoaiSP" /> </div>
                                        </div>
            
            
                                        <div class="form-group">
                                            <div class="col-md-4"> </div>
                                            <div class="col-md-7">
                                                <span id="save" class="btn btn-success margin-right-btn" ng-click="CreateUpdate()">
                                                    <i class="icon-save"></i> 
                                                </span>
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