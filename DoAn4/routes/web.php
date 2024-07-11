<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('nguoidung.index');
});

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/index', 'index')->name('home');
    Route::get('/chitiet/{id}', 'chitiet')->name('chitiet');
    Route::get('/danhmucsp/{id}', 'danhmucsp')->name('danhmucsp');
    Route::get('/thuonghieu/{id?}', 'thuonghieu')->name('thuonghieu');
    Route::get('/gioithieu', 'gioithieu')->name('gioithieu');
    Route::get('/tintuc', 'tintuc')->name('tintuc');
    Route::get('/chitiettintuc/{id}', 'chitiettintuc')->name('chitiettintuc');
    Route::get('/lienhe', 'lienhe')->name('lienhe');
    Route::get('/sanpham','sanpham')->name('sanpham');
});
Route::controller(App\Http\Controllers\GioHangController::class)->group(function () {
    Route::get('/giohang', 'giohang')->name('giohang');
    Route::get('/checkout', 'checkout')->name('checkout');

    Route::get('/themvaogiohang/{ma}', 'themvaogiohang')->name('themvaogiohang');
    Route::get('/themvaogiohangchitiet/{ma}', 'themvaogiohangchitiet')->name('themvaogiohangchitiet');
    Route::get('/giamsoluong/{ma}', 'giamsoluong')->name('giamsoluong');
    Route::get('/tangsoluong/{ma}', 'tangsoluong')->name('tangsoluong');
    Route::get('/xoasanphamgiohang/{ma}', 'xoasanphamgiohang')->name('xoasanphamgiohang');
    Route::get('/xoatatca', 'xoatatca')->name('xoatatca');

    Route::get('/dathang', 'dathang')->name('dathang');
    Route::post('/thanhtoan', 'thanhtoan')->name('thanhtoan');
});

Route::controller(App\Http\Controllers\AdminController::class)->middleware('AdminRole')->group(function () {
    Route::get('/QuanLy_sanpham', 'QuanLy_sanpham')->name('QuanLy_sanpham');
    Route::get('/QuanLy_loaisp', 'QuanLy_loaisp')->name('QuanLy_loaisp');
    Route::get('/QuanLy_gioithieu', 'QuanLy_gioithieu')->name('QuanLy_gioithieu');
    Route::get('/QuanLy_thuonghieu', 'QuanLy_thuonghieu')->name('QuanLy_thuonghieu');
    Route::get('/QuanLy_nguoidung', 'QuanLy_nguoidung')->name('QuanLy_nguoidung');
    Route::get('/QuanLy_thongso', 'QuanLy_thongso')->name('QuanLy_thongso');
    Route::get('/QuanLy_menu', 'QuanLy_menu')->name('QuanLy_menu');
    Route::get('/QuanLy_slide', 'QuanLy_slide')->name('QuanLy_slide');
    Route::get('/QuanLy_lienhe', 'QuanLy_lienhe')->name('QuanLy_lienhe');
    Route::get('/QuanLy_NCC', 'QuanLy_NCC')->name('QuanLy_NCC');
    Route::get('/QuanLy_donhang', 'QuanLy_donhang')->name('QuanLy_donhang');
    Route::get('/QuanLy_Kho', 'QuanLy_Kho')->name('QuanLy_Kho');
    Route::get('/QuanLy_tintuc', 'QuanLy_tintuc')->name('QuanLy_tintuc');
    Route::get('/QuanLy_giamgia', 'QuanLy_giamgia')->name('QuanLy_giamgia');
    Route::get('/QuanLy_gia', 'QuanLy_gia')->name('QuanLy_gia');
    Route::get('/QuanLy_HoaDonNhap', 'QuanLy_HoaDonNhap')->name('QuanLy_HoaDonNhap');

    //đơn hàng 
    Route::get('/duyetdon/{id}', 'duyetDonHang')->name('duyetDonHang');
    Route::get('/huydon/{id}', 'huyDonHang')->name('huyDonHang');
    Route::get('/donhang_detail/{id}', 'donhang_detail')->name('donhang_detail');
    //sanpham
    Route::post('/sanpham_them', 'sanpham_them')->name('sanpham_them');
    Route::get('QuanLy_sanpham_update/{ma}', 'sanpham_update')->name('QuanLy_sanpham_update');
    Route::put('/sanpham_sua/{ma}', 'sanpham_sua')->name('sanpham_sua');
    Route::delete('/sanpham_xoa/{id}', 'sanpham_xoa')->name('sanpham_xoa');
    //kho
    Route::get('/QuanLy_kho_them', 'kho_create')->name('QuanLy_kho_them');
    Route::post('/kho_them', 'kho_them')->name('kho_them');
    Route::get('/kho_detail/{id}', 'kho_detail')->name('kho_detail');
    Route::get('QuanLy_kho_update/{ma}', 'kho_update')->name('QuanLy_kho_update');
    Route::put('/kho_sua/{ma}', 'kho_sua')->name('kho_sua');
    Route::delete('/kho_xoa/{id}', 'kho_xoa')->name('kho_xoa');
     //Hóa đơn nhập
     Route::get('/QuanLy_HoaDonNhap_them', 'HoaDonNhap_create')->name('QuanLy_HoaDonNhap_them');
     Route::post('/HoaDonNhap_them', 'HoaDonNhap_them')->name('HoaDonNhap_them');
     Route::get('/HoaDonNhap_detail/{id}', 'HoaDonNhap_detail')->name('HoaDonNhap_detail');
     Route::get('QuanLy_HoaDonNhap_update/{ma}', 'HoaDonNhap_update')->name('QuanLy_HoaDonNhap_update');
     Route::put('/HoaDonNhap_sua/{ma}', 'HoaDonNhap_sua')->name('HoaDonNhap_sua');
     Route::delete('/HoaDonNhap_xoa/{id}', 'HoaDonNhap_xoa')->name('HoaDonNhap_xoa');
    //tin tức
    Route::post('/tintuc_them', 'tintuc_them')->name('tintuc_them');
    Route::get('QuanLy_tintuc_update/{ma}', 'tintuc_update')->name('QuanLy_tintuc_update');
    Route::put('/tintuc_sua/{ma}', 'tintuc_sua')->name('tintuc_sua');
    Route::delete('/tintuc_xoa/{id}', 'tintuc_xoa')->name('tintuc_xoa');

    // loại sản phẩm
    Route::post('/loaisp_them', 'loaisp_them')->name('loaisp_them');
    Route::get('QuanLy_loaisp_update/{ma}', 'loaisp_update')->name('QuanLy_loaisp_update');
    Route::put('/loaisp_sua/{ma}', 'loaisp_sua')->name('loaisp_sua');
    Route::delete('/loaisp_xoa/{id}', 'loaisp_xoa')->name('loaisp_xoa');


    //menu
    Route::post('/menu_them', 'menu_them')->name('menu_them');
    Route::get('QuanLy_menu_update/{ma}', 'menu_update')->name('QuanLy_menu_update');
    Route::put('/menu_sua/{ma}', 'menu_sua')->name('menu_sua');
    Route::delete('/menu_xoa/{id}', 'menu_xoa')->name('menu_xoa');

    //liên hệ 
    Route::post('/lienhe_them', 'lienhe_them')->name('lienhe_them');
    Route::get('QuanLy_lienhe_update/{ma}', 'lienhe_update')->name('QuanLy_lienhe_update');
    Route::put('/lienhe_sua/{ma}', 'lienhe_sua')->name('lienhe_sua');
    Route::delete('/lienhe_xoa/{id}', 'lienhe_xoa')->name('lienhe_xoa');

    //nhà cung cấp 
    Route::post('/ncc_them', 'ncc_them')->name('ncc_them');
    Route::delete('/ncc_xoa/{id}', 'ncc_xoa')->name('ncc_xoa');


    //giá
    Route::post('/gia_them', 'gia_them')->name('gia_them');
    Route::get('QuanLy_gia_update/{ma}', 'gia_update')->name('QuanLy_gia_update');
    Route::put('/gia_sua/{ma}', 'gia_sua')->name('gia_sua');
    Route::delete('/gia_xoa/{id}', 'gia_xoa')->name('gia_xoa');


    //Thông số kỹ thuật 
    Route::post('/thongso_them', 'thongso_them')->name('thongso_them');
    Route::get('QuanLy_thongso_update/{id}', 'thongso_update')->name('QuanLy_thongso_update');
    Route::put('/thongso_sua/{id}', 'thongso_sua')->name('thongso_sua');
    Route::delete('/thongso_xoa/{id}', 'thongso_xoa')->name('thongso_xoa');

    //thương hiệu 
    Route::post('/thuonghieu_them', 'thuonghieu_them')->name('thuonghieu_them');
    Route::get('QuanLy_thuonghieu_update/{ma}', 'thuonghieu_update')->name('QuanLy_thuonghieu_update');
    Route::put('/thuonghieu_sua/{ma}', 'thuonghieu_sua')->name('thuonghieu_sua');
    Route::delete('/thuonghieu_xoa/{id}', 'thuonghieu_xoa')->name('thuonghieu_xoa');

    //giảm giá 
    Route::post('/giamgia_them', 'giamgia_them')->name('giamgia_them');
    Route::get('QuanLy_giamgia_update/{ma}', 'giamgia_update')->name('QuanLy_giamgia_update');
    Route::put('/giamgia_sua/{ma}', 'giamgia_sua')->name('giamgia_sua');
    Route::delete('/giamgia_xoa/{id}', 'giamgia_xoa')->name('giamgia_xoa');

    //người dùng 
    Route::post('/nguoidung_them', 'nguoidung_them')->name('nguoidung_them');
    Route::get('QuanLy_nguoidung_update/{ma}', 'nguoidung_update')->name('QuanLy_nguoidung_update');
    Route::put('/nguoidung_sua/{ma}', 'nguoidung_sua')->name('nguoidung_sua');
    Route::delete('/nguoidung_xoa/{id}', 'nguoidung_xoa')->name('nguoidung_xoa');
});

Route::controller(App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/dangky', 'show')->name('dangky');
    Route::post('/dangky','store')->name('dangky.post');
    Route::get('/login', 'login')->name('login');
    Route::post('/login','formdangnhap')->name('login.post');
    Route::get('/logout','logout')->name('logout');
});






