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
                            <h2>Sửa Loại  <small></small></h2>
                            <form  class="form-horizontal row-border" action="/lienhe_sua/{{$lienhe->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label class="col-md-4 control-label" for="input17"> Thông tin liên hệ </label>
                                         <div class="col-md-7"> 
                                             <input type="text" class="form-control" name="ThongTinLienHe" value="{{$lienhe->ThongTinLienHe}}"  />
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Email</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="Email" value="{{$lienhe->Email}}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Số Điện thoại </label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="SoDienThoai" value="{{$lienhe->SoDienThoai}}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">CoSoLienHe </label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="CoSoLienHe" value="{{$lienhe->CoSoLienHe}}"  />
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