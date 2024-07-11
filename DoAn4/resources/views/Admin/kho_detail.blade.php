@extends('Admin.layout')
@section('Admin.content')
<div class="container body">
    @include('Admin.menuleft')
    @include('Admin.menutop')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2> chi tiết kho <small></small></h2>
                            <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã kho</th> 
                                        <th>Mã Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ctkho as $item)
                                    <tr>
                                        <td>{{$item->kho_id}}</td>
                                        <td>{{$item->sanpham_id}}</td>
                                        <td>{{$item->SoLuong}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                       
                            </table>
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