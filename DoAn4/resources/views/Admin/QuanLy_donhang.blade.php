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
                            <h2>Quản lý Đơn Hàng <small></small></h2>
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
                                        <th><a>Mã ĐH</a></th>
                                        <th>Tên khách hàng</th> 
                                        <th>Ngày đặt</th>
                                        <th>Tình trạng đơn hàng </th>
                                        <th colspan="1">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donhang as $item)
                                        <tr>
                                            <td value="name">{{$item->id}}</td>
                                            <td>{{$item->TenKhachHang}}</td>
                                            <td>{{date('d/m/Y', strtotime($item->created_at))}}</td>
                                            <td>
                                                @if ($item->TrangThai == 1)
                                                    <p style="color:red">đã duyệt bởi {{Auth::user()->name}}</p>
                                                @elseif ($item->TrangThai == 0)
                                                    <p style="color:orange">chờ duyệt</p>
                                                @else
                                                    <p style="color:rgba(0, 0, 0, 1);">đã hủy bởi {{Auth::user()->name}}</p>
                                                @endif
                                            </td>                                            
                                            <td>
                                                @if ($item->TrangThai == 2)
                                                    <a href="/donhang_detail/{{$item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Chi tiết đơn hàng đã hủy </a>
                                                @elseif  ($item->TrangThai == 0 || $item->TrangThai == 1)
                                                    <a href="/donhang_detail/{{$item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Chi tiết đơn hàng</a>
                                                @endif
                                                @if ($item->TrangThai == 0)
                                                    <a href="/duyetdon/{{$item->id}}" id="duyetdon" onclick="return  confirm('Duyệt đơn thành công')" class="btn btn-success btn-xs btn-toggle"><i class="fa fa-check"></i> Duyệt đơn</a>
                                                    <a href="/huydon/{{$item->id}}" id="huydon" onclick="return  confirm('Hủy đơn thành công')" class="btn btn-danger btn-xs btn-toggle"><i class="fa fa-times"></i> Hủy đơn</a>
                                                @endif
                                            </td>                                                                                
                                        </tr>
                                    @endforeach
                                </tbody>                                
                            </table>
                            <div class=""style="margin-left:500px">{{$donhang->appends(request()->all())->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection