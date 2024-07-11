<div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Hệ thống quản trị!</span></a>
        </div>
    
        <div class="clearfix"></div>
    
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="Admin/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span style="display: block">Chào mừng,</span>
                <span>  @if (Auth::check())
                    {{Auth::user()->name}}
                    @endif
                </span>
            </div>
        </div>
        <!-- /menu profile quick info -->
    
        <br />
    
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Hệ thống quản lý</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-home"></i> Thông tin hệ thống <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/Admin/NguoiDungs/Index">Quản lý người dùng</a></li>
                            <li><a href="index2.html">Đổi mật khẩu</a></li>
    
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-edit"></i> Hệ thống quản lý <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/Admin/SanPhamAd/Index">Quản lý sản phẩm</a></li>
                            <li><a href="/Admin/LoaiSPAd/Index">Quản lý loại sản phẩm</a></li>
                            <li><a href="/Admin/KhachHangAd/Index">Quản lý Khach Hang </a></li>
                            <li><a href="/Admin/ThuongHieuAd/Index">Quản lý Thuong Hieu </a></li>
                            <li><a href="/Admin/TinTucAd/Index">Quản lý Tin Tức </a></li>
                            <li><a href="/Admin/DonHangAd/Index">Quản lý đơn hàng</a></li>
                            <li><a href="/Admin/HDNAd/Index">Quản lý hóa đơn nhập</a></li>
                            <li><a href="form_buttons.html">Quản lý nhân viên</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>       
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>