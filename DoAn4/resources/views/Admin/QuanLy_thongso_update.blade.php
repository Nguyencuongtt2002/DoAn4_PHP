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
                            <h2>Sửa Giá <small></small></h2>
                            <form  class="form-horizontal row-border" action="/thongso_sua/{{$thongso->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Tên thông số</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="TenThongSo" value="{{$thongso->TenThongSo}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mô tả thông Tin</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="MoTaThongTin" value="{{$thongso->MoTaThongTin}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mã Giá Sản Phẩm</label>
                                        <div class="col-md-7"> 
                                           <select class="form-control" name="sanpham_id"> 
                                               @foreach ($sanpham as $id => $TenSP)
                                                   <option value="{{$id}}">{{$TenSP}}</option>
                                               @endforeach
                                           </select>
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