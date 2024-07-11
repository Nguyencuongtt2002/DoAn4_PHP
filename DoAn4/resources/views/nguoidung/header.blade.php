<div id="header" class="header">

    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 logo">
                <a href="index.html"><img style="width: 150px;height: 80px;" alt="Eco Shop" src="/nguoidung/Images/Mark_brand.png"/></a>
            </div>
            <div style="margin-top: 30px; display: inline-block; ">
              <form action="{{ route('sanpham') }}" method="GET">
                  <input id="TimKiem" type="text" name="q" placeholder="Bạn đang tìm gì..."/>
                  <input style="border: 1px solid black;" id="nuttimkiem" type="submit" value="Tìm kiếm" />
              </form>
            </div>
            <div id="cart">
                <a  > <img id="img-cart" src="/nguoidung/Images/cart.png" alt="Giỏ hàng" /> </a> 
                <a href="/giohang" >Giỏ hàng
                  @php
                    $tongsoluong = 0;
                    if(session()->has('giohang')){
                        foreach(session('giohang') as $sp){
                            $tongsoluong += $sp['soluong'];
                        }
                    }
                    echo $tongsoluong;
                @endphp
                </a>				
            </div>
        </div>
        <div style="float: right">
            @if (Auth::check())
                <span>Xin chào, {{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" style="margin-left: 10px;"> / Đăng xuất</a>
            @else
                <a href="{{ route('login') }}">Đăng nhập</a>
                <a href="{{route('dangky')}}">/Đăng ký</a>
            @endif      
        </div>
    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
          <div class="row">
            <div id="main-menu" class="col-sm-12 main-menu">
              <nav class="navbar navbar-default">
                <div class="container">
                  <div class="navbar-header" style="background-color: #EEEEEE;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                      <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#">My Shop</a>
                  </div>
                  <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                      @foreach ($menu as $item)
                        <li ><a href="{{$item->link}}">{{$item->TenMenu}}</a></li>  
                      @endforeach
                    </ul>
                 </div>

                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>          
</div>