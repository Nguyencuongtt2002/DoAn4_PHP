@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="columns-container">
     <div class="container" id="columns">
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                <div class="column col-xs-12 col-sm-3" id="left_column">
                    <!-- block category -->
                    <div class="block left-module">
                        <p class="title_block"><span class="fa fa-list"></span>Danh muc</p>
    
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-category">
                                <div class="layered-content">
                                    <ul class="tree-menu">
                                        <li class="active">
                                            <span></span><a href="#">Áo thun nam</a>
    
                                        </li>
                                        <li><span></span><a href="#">Áo thun nữ</a></li>
                                        <li><span></span><a href="#">Áo sơ mi nam</a></li>
                                        <li><span></span><a href="#">Áo sơ mi nữ</a></li>
                                        <li><span></span><a href="#">Đầm nữ</a></li>
                                        <li><span></span><a href="#">Chân váy</a></li>
                                        <li><span></span><a href="#">Quần jean nữ</a></li>
                                        <li><span></span><a href="#">......</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ./layered -->
                        </div>
                    </div>
                    <!-- ./block category  -->
                    <!-- block video -->
                    <div class="block left-module">
                        <p class="title_block"><span class="fa fa-video-camera"></span>San pham ban chay </p>
                    </div>
                    <!-- ./block video  -->
                    <!-- block image -->
                    <div class="block left-module">
                        <p class="title_block"><span class="fa fa-camera"></span>  GALLERIES</p>
                    </div>
                    <!-- ./block image  -->
                </div>
    
                <!-- ./left colunm -->
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <!-- page heading-->
                    <h2 class="page-heading">
                        <span class="page-heading-title"><span class="fa fa-newspaper-o"></span> NEWS</span>
                    </h2>
                    <!-- ../page heading-->
                    @foreach ($db as $item)
                        <ul class="blog-posts">
                            <div >
                                <li class="post-item">
                                    <article class="entry">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="entry-thumb image-hover2">
                                                    <a>
                                                        <img  src="nguoidung/Images/{{$item->AnhTinTuc}}"  alt="News">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="entry-ci">
                                                    <h3 class="entry-title"><a href="">{{$item->TieuDe}}</a></h3>
        
                                                    <div class="entry-meta-data">
                                                        <span class="author">
                                                            <i class="fa fa-user"></i>
                                                            by: <a href="#">Ngày đăng:</a>
                                                        </span>
                                                        <span class="date"><i class="fa fa-calendar"></i>{{ date('d/m/Y', strtotime($item->created_at)) }} </span>
                                                    </div>
                                                    <div class="entry-excerpt">
                                                        @if(strlen($item->NoiDung) > 50)
                                                            {{ substr($item->NoiDung, 0, 50) . '...' }}
                                                        @else
                                                            {{ $item->NoiDung }}
                                                        @endif
                                                    </div>
                                                    <div class="entry-more">
                                                        <a href="/chitiettintuc/{{ $item->id }}">Xem chi tiết </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            </div>
                        </ul>
                    @endforeach

                </div>
            </div>
        </div>
</div>
@endsection 