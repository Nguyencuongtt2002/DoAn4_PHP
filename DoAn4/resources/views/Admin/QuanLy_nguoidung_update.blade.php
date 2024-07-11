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
                            <h2>Sửa người dùng <small></small></h2>
                            <form novalidate name="frmLoaiSP" class="form-horizontal row-border"action="/nguoidung_sua/{{$nguoidung->id}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Name</label>
                                        <div class="col-md-7"> <input type="text"  class="form-control" name="name" value="{{$nguoidung->name}}" /> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Email</label>
                                        <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="email"value="{{$nguoidung->email}}"/> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">AnhDaiDien</label>
                                        <div class="col-md-7"> 
                                            <input type="file"  class="form-control" name="avatar"  /> 
                                            <img src="/nguoidung/Images/avatar/{{$nguoidung->avatar}}" style="width:300px" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">SoDienThoai</label>
                                        <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="phone" value="{{$nguoidung->phone}}" /> </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">VaiTro</label>
                                        <div class="col-md-7"> 
                                            <select class="form-control" name="role">
                                                <option value="1" @if($nguoidung->role == "1") selected @endif>User</option>
                                                <option value="0" @if($nguoidung->role == "0") selected @endif>Admin</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Trạng Thái</label>
                                        <div class="col-md-7"> 
                                            <select class="form-control" name="status">
                                                <option value="0" @if($nguoidung->status == 0) selected @endif>false</option>
                                                <option value="1" @if($nguoidung->status == 1) selected @endif>True</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">password</label>
                                        <div class="col-md-7"> <input type="password" id="idTenThuongHieu" class="form-control" name="password" value="{{$nguoidung->password}}" /> </div>
                                    </div> 
                                    <input type="submit" value="save" class="btn btn-success" style="background-color: aquamarine;color:black">
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
</div>
@endsection