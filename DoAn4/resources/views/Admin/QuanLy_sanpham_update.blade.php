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
                            <h2>Sửa sản phẩm<small></small></h2>
                            <form  class="form-horizontal row-border" action="/sanpham_sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label class="col-md-4 control-label" for="input17">Tên SP</label>
                                         <div class="col-md-7"> 
                                             <input type="text" class="form-control" name="TenSP" value="{{$sanpham->TenSP}}"  />
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mô tả</label>
                                        <div class="col-md-7"> 
                                            <textarea type="text" class="form-control" name="MoTa" value="{{$sanpham->MoTa}}">{{$sanpham->MoTa}}</textarea>
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Size</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="Size" value="{{$sanpham->Size}}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Tên loại</label>
                                        <div class="col-md-7"> 
                                            <select class="form-control" name="loaisanpham_id" value="{{$sanpham->TenLoaiSanPham}}">
                                                @foreach ($loaisanpham as $id => $TenLoaiSanPham)
                                                    <option value="{{$id}}">{{$TenLoaiSanPham}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Tên TH</label>
                                        <div class="col-md-7"> 
                                            <select class="form-control" name="thuonghieu_id"  value="{{$sanpham->TenThuongHieu}}"> 
                                                @foreach ($thuonghieu as $id => $TenThuongHieu)
                                                    <option value="{{$id}}">{{$TenThuongHieu}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">AnhDaiDien</label>
                                        <div class="col-md-7"> 
                                            <input type="file"  class="form-control" name="AnhDaiDien"  /> 
                                            <img src="/nguoidung/Images/{{$sanpham->AnhDaiDien}}" style="width:300px" />
                                        </div>
                                    </div>
                                    
                                     <input type="submit" value="save" class="btn btn-success" style="background-color: aquamarine;color:black">
                                 </div>
                             </form>
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