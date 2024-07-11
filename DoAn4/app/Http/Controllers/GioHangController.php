<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\sanpham;
use App\Models\khachhang;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\chitietkho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class GioHangController extends Controller
{
    public function checkout(){
        $menu = Menu::all();
        return view('nguoidung.checkout',compact('menu'));
    }
    public function giohang(){
        $menu = Menu::all();
        return view('nguoidung/giohang',compact('menu'));
    }
    public function themvaogiohang($id) {
        // Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
        $sanpham = sanpham::where('sanpham.id', '=', $id)
                            ->join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                            ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                            ->select('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                            ->first();
    
        // Kiểm tra nếu sản phẩm có phần trăm giảm giá
        if ($sanpham->PhanTramGiamGia != '') {
            // Lưu giá cũ vào thuộc tính GiaCu
            $sanpham->GiaCu = $sanpham->DonGia;
            // Tính toán giá mới sau khi giảm giá
            $sanpham->DonGia = $sanpham->DonGia - ($sanpham->DonGia / 100 * $sanpham->PhanTramGiamGia);
        } else {
            $sanpham->GiaCu = 0;
        }
    
        // Lấy giỏ hàng từ session
        $cart = session()->get('giohang', []);
    
        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$id])) {
            // Tăng số lượng sản phẩm lên 1
            $cart[$id]['soluong']++;
        } else {
            // Kiểm tra số lượng sản phẩm trong tất cả các chi tiết kho
            $tongSoLuong = chitietkho::where('sanpham_id', $id)->sum('soluong');
    
            // Nếu tổng số lượng bằng 0, không thêm vào giỏ hàng
            if ($tongSoLuong == 0) {
                // Trả về thông báo
                return redirect()->back()->with('error', 'Sản phẩm không có sẵn trong kho.');
            }
    
            // Thêm sản phẩm vào giỏ hàng
            $cart[$id] = [
                "id" => $id,
                "tensp" => $sanpham->TenSP,
                "anh" => $sanpham->AnhDaiDien,
                "gia" => $sanpham->DonGia,
                "soluong" => 1
            ];
        }
    
        // Cập nhật giỏ hàng trong session
        session()->put('giohang', $cart);
    
        // Chuyển hướng về trang trước đó
        return redirect()->back();
    }    
    public function themvaogiohangchitiet($id, Request $request) {
        // Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
        $sanpham = sanpham::where('sanpham.id', '=', $id)
                                ->join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                                ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                                ->select('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                                ->first();
        // Kiểm tra nếu sản phẩm có phần trăm giảm giá
        if ($sanpham->PhanTramGiamGia != '') {
            // Lưu giá cũ vào thuộc tính GiaCu
            $sanpham->GiaCu = $sanpham->DonGia;
            // Tính toán giá mới sau khi giảm giá
            $sanpham->DonGia = $sanpham->DonGia - ($sanpham->DonGia / 100 * $sanpham->PhanTramGiamGia);
        } else {
            $sanpham->GiaCu = 0;
        }
    
        // Lấy giỏ hàng từ session
        $cart = session()->get('giohang', []);
    
        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$id])) {
            // Tăng số lượng sản phẩm thêm vào số lượng hiện có
            $cart[$id]['soluong'] += $request->number;
        } else {
            // Thêm sản phẩm vào giỏ hàng với số lượng được chỉ định trong yêu cầu
            $cart[$id] = [
                "id" => $id,
                "tensp" => $sanpham->TenSP,
                "anh" => $sanpham->AnhDaiDien,
                "gia" => $sanpham->DonGia,
                "soluong" => $request->number,
            ];
        }
    
        // Cập nhật giỏ hàng trong session
        session()->put('giohang', $cart);
        
        // Chuyển hướng về trang trước đó
        return redirect()->back();
    }    
    public function xoasanphamgiohang($id){
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if(session()->has('giohang.' . $id)){
            // Nếu tồn tại, xóa sản phẩm khỏi giỏ hàng
            session()->forget('giohang.' . $id);
        }
        // Chuyển hướng về trang trước đó
        return redirect()->back();
    }    
    public function tangsoluong($id){
        // Lấy thông tin sản phẩm từ giỏ hàng
        $sanpham = session('giohang.'.$id);
        if ($sanpham) {
            // Tăng số lượng sản phẩm lên 1 đơn vị
            $sanpham['soluong']++;
            // Cập nhật lại thông tin sản phẩm trong giỏ hàng
            session(['giohang.'.$id => $sanpham]);
        }
        // Chuyển hướng về trang trước đó
        return redirect()->back();
    }    
    public function giamsoluong($id) {
        // Lấy thông tin sản phẩm từ giỏ hàng
        $sanpham = session('giohang.' . $id);
        if ($sanpham) {
            // Giảm số lượng sản phẩm đi 1 đơn vị
            $sanpham['soluong']--;
            if ($sanpham['soluong'] == 0) {
                // Nếu số lượng sản phẩm là 0, xóa sản phẩm khỏi giỏ hàng
                session()->forget('giohang.' . $id);
            } else {
                // Cập nhật lại thông tin sản phẩm trong giỏ hàng
                session(['giohang.' . $id => $sanpham]);
            }
        }
        // Chuyển hướng về trang trước đó
        return redirect()->back();
    }    
    public function xoatatca(){
        // Xóa toàn bộ giỏ hàng bằng cách xóa session 'giohang'
        Session::forget('giohang');
        // Chuyển hướng về trang trước đó
        return redirect()->back();
    }    

    public function dathang()
    {
        // Lấy danh sách menu
        $menu = menu::all();

        // Kiểm tra giỏ hàng
        if(!session()->has('giohang') || count(session('giohang')) == 0) {
            // Nếu giỏ hàng không tồn tại hoặc không có sản phẩm nào trong giỏ hàng,
            // chuyển hướng về trang trước đó với thông báo thành công
            return redirect()->back()->with('success', 'Giỏ hàng chưa có sản phẩm nào!!!');
        } else {
            // Kiểm tra trạng thái đăng nhập của người dùng
            if(!Auth::check()){
                // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập và gửi thông báo thành công
                return redirect()->route('login')->with('success', 'Vui lòng đăng nhập trước khi mua hàng!!!');
            } else if(Auth::user()->role == 0) {
                // Nếu người dùng là tài khoản Admin, không được phép mua hàng,
                // chuyển hướng về trang trước đó với thông báo thành công
                return redirect()->back()->with('success', 'Tài khoản Admin không được mua hàng !');
            } else {
                // Nếu đủ điều kiện, chuyển hướng đến trang thanh toán (checkout) và truyền danh sách menu
                return view('nguoidung.checkout', compact('menu'));
            }
        }
    }
    public function thanhtoan(Request $request)
    {
        // Tạo một bản ghi khách hàng mới trong CSDL từ dữ liệu được gửi lên từ yêu cầu HTTP
        khachhang::create($request->all());

        // Lấy id của khách hàng mới được tạo
        $khachhangmoi = khachhang::orderBy('id', 'desc')->first()->id;

        // Tạo một bản ghi đơn hàng mới trong CSDL
        $donhang = new donhang();
        $donhang->khachhang_id = $khachhangmoi;
        $donhang->TrangThai = false;
        $donhang->save();

        // Lấy id của đơn hàng mới được tạo
        $donhangmoi = donhang::orderBy('id', 'desc')->first()->id;

        // Lấy thông tin giỏ hàng từ session
        $giohang = session()->get('giohang');

        // Lặp qua từng sản phẩm trong giỏ hàng và tạo bản ghi chi tiết đơn hàng tương ứng
        foreach ($giohang as $ctdh) {
            $ctdonhang = new chitietdonhang();
            $ctdonhang->donhang_id = $donhangmoi;
            $ctdonhang->sanpham_id = $ctdh['id'];
            $ctdonhang->SoLuong = $ctdh['soluong'];
            $ctdonhang->GiaTien = $ctdh['gia'];
            $ctdonhang->save();
        }

        // Xóa thông tin giỏ hàng sau khi đã hoàn thành đơn hàng
        Session::forget('giohang');

        // Chuyển hướng về trang chủ
        return redirect()->route('home');
    }

}
