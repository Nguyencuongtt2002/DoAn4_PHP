<?php

namespace App\Http\Controllers;

use App\Models\chitiettintuc;
use App\Models\Gia;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\gioithieu;
use App\Models\Lienhe;
use App\Models\Loaisanpham;
use App\Models\ThuongHieu;
use App\Models\tintuc;
use App\Models\Menu;
use App\Models\Slide;
use App\Models\chitietkho;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function sanpham(Request $request){
        $menu = Menu::all();
        $timkiem = $request->input('q');
        $sanphamtimkiem= sanpham::limit(20)->join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
        ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
        ->select('sanpham.*', 'gia.DonGia', 'gia.NgayBD', 'gia.NgayKT', 'giamgia.PhanTramGiamGia','giamgia.ThoiGianBatDau','giamgia.ThoiGianKetThuc', 'gia.DonGia AS GiaCu')
        ->where('TenSP', 'like', '%'.$timkiem.'%')
        ->get();
        foreach ($sanphamtimkiem as $sanpham) {
            if ($sanpham->PhanTramGiamGia !== null) {
                $sanpham->GiaCu = $sanpham->DonGia;
                $sanpham->DonGia = $sanpham->DonGia - ($sanpham->DonGia / 100 * $sanpham->PhanTramGiamGia);
            } else {
                $sanpham->GiaCu = 0;
            }
        }
        return view('nguoidung.sanpham', compact('sanphamtimkiem','menu'));
    }



    public function index()
    {
        // Lấy danh sách các Slide
        $Slide = Slide::all();

        // Lấy danh sách các menu
        $menu = Menu::all();

        // Lấy thời gian hiện tại
        $now = Carbon::now();

        // Lấy danh sách sản phẩm mới
        $sanphammoi = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                                        ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                                        ->select('sanpham.*', 'gia.DonGia', 'gia.NgayBD', 'gia.NgayKT', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                                        ->where('gia.NgayBD', '<=', $now)
                                        ->where('gia.NgayKT', '>=', $now)
                                        ->orderBy('created_at', 'desc')->get();

        // Cập nhật giá và giá cũ cho sản phẩm mới
        foreach ($sanphammoi as $sanpham) {
            if ($sanpham->PhanTramGiamGia !== null) {
                $sanpham->GiaCu = $sanpham->DonGia;
                $sanpham->DonGia = $sanpham->DonGia - ($sanpham->DonGia / 100 * $sanpham->PhanTramGiamGia);
            } else {
                $sanpham->GiaCu = 0;
            }
        }

        // Lấy danh sách sản phẩm bán chạy
        $sanphambanchay = SanPham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                                ->leftJoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                                ->join('chitietdonhang', 'chitietdonhang.sanpham_id', '=', 'sanpham.id')
                                ->join('donhang', 'chitietdonhang.donhang_id', '=', 'donhang.id')
                                ->select('sanpham.*', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia As GiaCu', 
                                    DB::raw('SUM(IF(donhang.TrangThai <> 2 AND donhang.TrangThai <> 0, chitietdonhang.SoLuong, 0)) As Tong'))
                                ->whereNotIn('donhang.TrangThai', [0, 2])
                                ->groupBy('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'sanpham.MoTa','sanpham.Size','sanpham.loaisanpham_id','sanpham.thuonghieu_id','sanpham.created_at', 'sanpham.updated_at', 'GiaCu', 'gia.DonGia', 'giamgia.PhanTramGiamGia')
                                ->orderBy('Tong', 'desc')->get(); 

        // Cập nhật giá và giá cũ cho sản phẩm bán chạy
        foreach ($sanphambanchay as $sanpham) {
            if        ($sanpham->PhanTramGiamGia !== null) {
                $sanpham->GiaCu = $sanpham->DonGia;
                $sanpham->DonGia = $sanpham->DonGia - ($sanpham->DonGia / 100 * $sanpham->PhanTramGiamGia);
            } else {
                $sanpham->GiaCu = 0;
            }
        }

        // Lấy danh sách sản phẩm giảm giá
        $sanphamgiamgia = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                                            ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                                            ->select('sanpham.*', 'gia.DonGia', 'gia.NgayBD', 'gia.NgayKT', 'giamgia.PhanTramGiamGia','giamgia.ThoiGianBatDau','giamgia.ThoiGianKetThuc', 'gia.DonGia AS GiaCu')
                                            ->where(function ($query) {
                                                $query->where('giamgia.ThoiGianBatDau', '<=', Carbon::now())
                                                    ->where('giamgia.ThoiGianKetThuc', '>=', Carbon::now());
                                            })
                                            ->orderBy('giamgia.PhanTramGiamGia', 'desc')->get();

        // Cập nhật giá và giá cũ cho sản phẩm giảm giá
        foreach ($sanphamgiamgia as $sanpham) {
            if ($sanpham->PhanTramGiamGia !== null) {
                $sanpham->GiaCu = $sanpham->DonGia;
                $sanpham->DonGia = $sanpham->DonGia - ($sanpham->DonGia / 100 * $sanpham->PhanTramGiamGia);
            } else {
                $sanpham->GiaCu = 0;
            }
        }

        // Trả về view 'nguoidung.index' với các biến sanphammoi, sanphambanchay, sanphamgiamgia, menu, Slide
        return view('nguoidung.index', compact('sanphammoi','sanphambanchay','sanphamgiamgia','menu','Slide'));
    }








    
    public function chitiet($id)
    {
        // Lấy danh sách menu
        $menu = Menu::all();

        // Lấy danh sách loại sản phẩm
        $loaisanpham = loaisanpham::get()->take(20);

        // Lấy thông tin chi tiết của sản phẩm dựa trên $id
        $ct = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                    ->leftJoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                    ->leftJoin('chitietkho', 'sanpham.id', '=', 'chitietkho.sanpham_id')
                    ->where('sanpham.id', $id)
                    ->select('sanpham.*', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu', 'chitietkho.SoLuong')
                    ->first();

        // Tính tổng số lượng sản phẩm có sẵn trong kho
        $tongSoLuong = chitietkho::where('sanpham_id', $id)->sum('SoLuong');

        // Lấy thông số sản phẩm của sản phẩm
        $thongSoSanPham = $ct->thongSoSanPham()->get();

        // Cập nhật giá và giá cũ cho sản phẩm
        if ($ct->PhanTramGiamGia !== null) {
            $ct->GiaCu = $ct->DonGia;
            $ct->DonGia = $ct->DonGia - ($ct->DonGia / 100 * $ct->PhanTramGiamGia);
        } else {
            $ct->GiaCu = 0;
        }

        // Trả về view 'nguoidung/chitiet' với các biến ct, thongSoSanPham, loaisanpham, menu, tongSoLuong
        return view('nguoidung/chitiet', compact('ct', 'thongSoSanPham', 'loaisanpham', 'menu', 'tongSoLuong'));
    }

    





    public function danhmucsp($id)
    {
        // Lấy danh sách loại sản phẩm
        $loaisanpham = loaisanpham::limit(20)->get();

        // Lấy danh sách sản phẩm của danh mục $id
        $sanpham = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                        ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                        ->select('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                        ->orderBy('giamgia.PhanTramGiamGia', 'desc')
                        ->where('sanpham.loaisanpham_id', '=', $id)
                        ->get();

        // Cập nhật giá và giá cũ cho sản phẩm
        foreach ($sanpham as $sp) {
            if ($sp->PhanTramGiamGia !== null) {
                $sp->GiaCu = $sp->DonGia;
                $sp->DonGia = $sp->DonGia - ($sp->DonGia / 100 * $sp->PhanTramGiamGia);
            } else {
                $sp->GiaCu = 0;
            }
        }

        // Lấy danh sách sản phẩm khác
        $sanphamkhac = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                            ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                            ->select('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                            ->orderBy('giamgia.PhanTramGiamGia', 'desc')
                            ->where('sanpham.loaisanpham_id', '!=', $id) 
                            ->whereNotIn('sanpham.id', $sanpham->pluck('id'))
                            ->orderBy('giamgia.PhanTramGiamGia', 'desc')
                            ->get();

        // Cập nhật giá và giá cũ cho sản phẩm khác
        foreach ($sanphamkhac as $sp) {
            if ($sp->PhanTramGiamGia !== null) {
                $sp->GiaCu = $sp->DonGia;
                $sp->DonGia = $sp->DonGia - ($sp->DonGia / 100 * $sp->PhanTramGiamGia);
            } else {
                $sp->GiaCu = 0;
            }
        }

        // Lấy danh sách menu
        $menu = Menu::all();
        return view('nguoidung/danhmucsp', ['loaisanpham' => $loaisanpham, 'sanpham' => $sanpham, 'sanphamkhac' => $sanphamkhac, 'menu'=> $menu]);
    }





    public function tintuc(){
        
        $menu = Menu::all();
        $db = tintuc::limit(10)->get();
        return view('nguoidung/tintuc',['db'=>$db,'menu'=> $menu]);
    }





    public function chitiettintuc($id){
        $menu = Menu::all();
        $loaisanpham = loaisanpham::limit(20)->get();
        $db = tintuc::find($id);
        return view('nguoidung/chitiettintuc', ['loaisanpham' => $loaisanpham, 'db' => $db,'menu'=> $menu]);

    }
    



    public function thuonghieu($id = null)
    {
        // Gán giá trị mặc định cho biến $id nếu không có giá trị được truyền vào
        $id = $id ?? 1;

        // Lấy danh sách menu
        $menu = Menu::all();

        // Lấy danh sách thương hiệu
        $thuonghieu = ThuongHieu::limit(20)->get();

        // Lấy danh sách sản phẩm của thương hiệu $id
        $sanpham = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                            ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                            ->select('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                            ->orderBy('giamgia.PhanTramGiamGia', 'desc')
                            ->where('sanpham.thuonghieu_id', '=', $id)
                            ->get();

        // Cập nhật giá và giá cũ cho sản phẩm
        foreach ($sanpham as $sp) {
            if ($sp->PhanTramGiamGia !== null) {
                $sp->GiaCu = $sp->DonGia;
                $sp->DonGia = $sp->DonGia - ($sp->DonGia / 100 * $sp->PhanTramGiamGia);
            } else {
                $sp->GiaCu = 0;
            }
        }

        // Lấy danh sách sản phẩm khác
        $sanphamkhac = sanpham::join('gia', 'sanpham.id', '=', 'gia.sanpham_id')
                                ->leftjoin('giamgia', 'sanpham.id', '=', 'giamgia.sanpham_id')
                                ->select('sanpham.id', 'sanpham.TenSP', 'sanpham.AnhDaiDien', 'gia.DonGia', 'giamgia.PhanTramGiamGia', 'gia.DonGia AS GiaCu')
                                ->orderBy('giamgia.PhanTramGiamGia', 'desc')
                                ->where('sanpham.thuonghieu_id', '!=', $id) // loại bỏ sản phẩm đang xem
                                ->whereNotIn('sanpham.id', $sanpham->pluck('id')) // loại bỏ các sản phẩm đã lấy
                                ->get();

        // Cập nhật giá và giá cũ cho sản phẩm khác
        foreach ($sanphamkhac as $sp) {
            if ($sp->PhanTramGiamGia !== null) {
                $sp->GiaCu = $sp->DonGia;
                $sp->DonGia = $sp->DonGia - ($sp->DonGia / 100 * $sp->PhanTramGiamGia);
            } else {
                $sp->GiaCu = 0;
            }
        }
        return view('nguoidung/thuonghieu', ['thuonghieu' => $thuonghieu, 'sanpham' => $sanpham,'menu'=> $menu,'sanphamkhac' =>  $sanphamkhac]);
    }





    public function gioithieu(){
        $menu = Menu::all();
        $db = gioithieu::limit(10)->get();
        return view('nguoidung/gioithieu',['db'=>$db,'menu'=> $menu]);
    }

    


    
    
    public function lienhe(){
       
        $menu = Menu::all();
        $db = Lienhe::limit(10)->get();
        return view('nguoidung/lienhe',['db'=>$db,'menu'=> $menu]);
    }
}
