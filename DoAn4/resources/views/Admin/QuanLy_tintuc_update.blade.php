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
                            <h2>Sửa tin tức<small></small></h2>
                            <form  class="form-horizontal row-border" action="/tintuc_sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label class="col-md-4 control-label" for="input17"> Tiêu đề</label>
                                         <div class="col-md-7"> 
                                             <input type="text" class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}"  />
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Nội Dung</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="NoiDung" value="{{$tintuc->NoiDung}}"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">AnhDaiDien</label>
                                        <div class="col-md-7"> 
                                            <input type="file"  class="form-control" name="AnhTinTuc"  /> 
                                            <img src="/nguoidung/Images/{{$tintuc->AnhTinTuc}}" style="width:150px;height:150px" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mã người dùng </label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control"  value="{{Auth::user()->name}}" readonly />
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