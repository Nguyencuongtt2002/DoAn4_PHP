@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="columns-container">
     <div class="container" id="columns">
         <!-- row -->
         <div class="row">
             <!-- Left colunm -->
             <div class="column col-xs-12 col-sm-3" id="left_column">
               <div class="block left-module">
                    <p style="background-color:black ; color:#FFF" class="title_block"><span class="fa fa-pagelines"></span>Danh Mục</p>
            
                    <div class="block_content">
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <div >
                                        @foreach ($loaisanpham  as $item)
                                           <li><a href="{{route('danhmucsp',['id'=>$item->id])}}">{{$item->TenLoaiSanPham}}</a></li>
                                        @endforeach
                                    </div>
                                </ul>
                           </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
             </div>

             <!-- Center colunm-->
             <div class="center_column col-xs-12 col-sm-9" id="center_column">
                 <!-- page heading-->
                 <div class="page-heading">
                    <h2>
                        <span class="page-heading-title"><span class="fa fa-paperclip"></span>{{$db->TieuDe}} </span>
                    </h2>
                    
                </div>
                <br/>
                <div style="width: 300px;float: left;">
                    <a>
                         <img  src="/nguoidung/Images/{{$db->AnhTinTuc}}"  alt="News">
                    </a>
                </div>
                <p>
                    {{$db->NoiDung}}
                </p>

                <div class="entry-meta-data" style="float: right; padding-top: 10px; padding-bottom: 10px">
                                            <span class="author">
                                            <i class="fa fa-user"></i>
                                            by: <a href="#">Ngày đăng :</a></span>
                    <span class="date"><i class="fa fa-calendar"></i>{{ date('d/m/Y', strtotime($db->created_at)) }}</span>
                </div>

             </div>
             <!-- ./ Center colunm -->
         </div>
         <!-- ./row-->
     </div>
 </div>
@endsection 