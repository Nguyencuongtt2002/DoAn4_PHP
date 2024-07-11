<?php

namespace App\Http\Controllers;

use App\Models\chitietanh;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\gioithieu;
use App\Models\Loaisanpham;
uSe App\Models\Lienhe;
use App\Models\NhaCungCap;
use App\Models\Gia;
use App\Models\GiamGia;
use App\Models\User;
use App\Models\ThongSoKyThuat;
use App\Models\ThuongHieu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\tintuc;
use App\Models\sanpham;
use App\Models\Kho;
use App\Models\chitietkho;
use App\Models\hoadonnhap;
use App\Models\chitiethoadonnhap;
use App\Models\donhang;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Contracts\Pagination\Paginator;
use App\Mail\DonHangDuyet;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    
    //sản phẩm 
    public function QuanLy_sanpham()
    {
        // Lấy danh sách sản phẩm từ bảng 'sanpham' và join với các bảng 'thuonghieu', 'loaisanpham', 'gia'
        $sanpham = sanpham::join('thuonghieu', 'thuonghieu.id', '=', 'sanpham.thuonghieu_id')
                ->join('loaisanpham', 'loaisanpham.id', '=', 'sanpham.loaisanpham_id')
                ->leftjoin('gia', 'gia.sanpham_id', '=', 'sanpham.id')
                ->select('sanpham.*', 'loaisanpham.TenLoaiSanPham', 'thuonghieu.TenThuongHieu')
                ->orderBy('sanpham.id', 'desc')
                ->paginate(10);

        // Lấy danh sách thương hiệu từ bảng 'thuonghieu' và tạo một mảng với khóa là ID và giá trị là tên thương hiệu
        $thuonghieu = DB::table('thuonghieu')->pluck('TenThuongHieu', 'id');

        // Lấy danh sách loại sản phẩm từ bảng 'loaisanpham' và tạo một mảng với khóa là ID và giá trị là tên loại sản phẩm
        $loaisanpham = DB::table('loaisanpham')->pluck('TenLoaiSanPham', 'id');

        // Kiểm tra nếu có giá trị trong biến 'key' (từ request), thực hiện tìm kiếm sản phẩm theo tên sản phẩm hoặc tên thương hiệu hoặc tên loại sản phẩm 
        if ($key = request()->key) {
            $sanpham = sanpham::join('thuonghieu', 'thuonghieu.id', '=', 'sanpham.thuonghieu_id')
                ->join('loaisanpham', 'loaisanpham.id', '=', 'sanpham.loaisanpham_id')
                ->leftjoin('gia', 'gia.sanpham_id', '=', 'sanpham.id')
                ->select('sanpham.*', 'loaisanpham.TenLoaiSanPham', 'thuonghieu.TenThuongHieu')
                ->orderBy('sanpham.id', 'desc')
                ->where('TenSP', 'like', '%' . $key . '%')
                ->orWhere('TenThuongHieu', 'like', '%' . $key . '%')
                ->orWhere('TenLoaiSanPham', 'like', '%' . $key . '%')
                ->paginate(10);

            $thuonghieu = DB::table('thuonghieu')->pluck('TenThuongHieu', 'id');
            $loaisanpham = DB::table('loaisanpham')->pluck('TenLoaiSanPham', 'id');
        }

        // Trả về view 'Admin.QuanLy_sanpham' với dữ liệu các sản phẩm, loại sản phẩm và thương hiệu, cũng như thứ tự hiển thị trang
        return view('Admin.QuanLy_sanpham', compact('sanpham','loaisanpham','thuonghieu'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    public function sanpham_them(Request $request)
    {
        // Lấy toàn bộ dữ liệu từ request
        $input = $request->all();

        // Kiểm tra nếu có file ảnh đại diện trong request
        if ($AnhDaiDienien = $request->file('AnhDaiDien')) {
            $destinationPath = 'nguoidung/Images/'; // Định nghĩa đường dẫn đích cho file 
            $profileImage = date('YmdHis') . "." . $AnhDaiDienien->getClientOriginalExtension();// Tạo tên file  bằng cách sử dụng ngày giờ hiện tại
            
            // Di chuyển file ảnh đại diện vào đường dẫn đích
            $AnhDaiDienien->move($destinationPath, $profileImage);

            // Cập nhật tên file ảnh đại diện vào mảng dữ liệu
            $input['AnhDaiDien'] = $profileImage;
        }

        // Tạo mới một sản phẩm với dữ liệu từ input và lưu vào cơ sở dữ liệu
        sanpham::create($input);

        // Chuyển hướng đến trang 'QuanLy_sanpham' và gửi thông báo thành công
        return redirect('QuanLy_sanpham')->with('thongbao', 'Thêm sản phẩm thành công!');
    }
    public function sanpham_update($ma)
    {   
        // Tìm kiếm sản phẩm với mã được chỉ định
        $sanpham = sanpham::find($ma);

        // Lấy danh sách thương hiệu từ bảng 'thuonghieu' và tạo một mảng với khóa là ID và giá trị là tên thương hiệu
        $thuonghieu = DB::table('thuonghieu')->pluck('TenThuongHieu', 'id');

        // Lấy danh sách loại sản phẩm từ bảng 'loaisanpham' và tạo một mảng với khóa là ID và giá trị là tên loại sản phẩm
        $loaisanpham = DB::table('loaisanpham')->pluck('TenLoaiSanPham', 'id');

        // Trả về view 'Admin/QuanLy_sanpham_update' với dữ liệu sản phẩm, loại sản phẩm và thương hiệu
        return view('Admin/QuanLy_sanpham_update', compact('sanpham', 'loaisanpham', 'thuonghieu'));
    }
    public function sanpham_sua(Request $request, $ma)
    {   
        // Lấy toàn bộ dữ liệu từ request
        $input = $request->all();

        // Kiểm tra nếu có file ảnh đại diện trong request
        if ($AnhDaiDien = $request->file('AnhDaiDien')) {
            $destinationPath = 'nguoidung/Images/';
            $profileImage = date('YmdHis') . "." . $AnhDaiDien->getClientOriginalExtension();
            
            // Di chuyển file ảnh đại diện vào đường dẫn đích
            $AnhDaiDien->move($destinationPath, $profileImage);

            // Cập nhật tên file ảnh đại diện vào mảng dữ liệu
            $input['AnhDaiDien'] = "$profileImage";
        } else {
            // Nếu không có file ảnh đại diện trong request, loại bỏ khỏi mảng dữ liệu
            unset($input['AnhDaiDien']);
        }

        // Tìm kiếm sản phẩm theo mã
        $sanpham = sanpham::find($ma);

        // Cập nhật thông tin sản phẩm với dữ liệu từ input
        $sanpham->update($input);

        // Chuyển hướng đến trang 'QuanLy_sanpham' và gửi thông báo thành công
        return redirect('QuanLy_sanpham')->with('thongbao', 'Sửa sản phẩm thành công!');
    }
    public function sanpham_xoa($id)
    {
        // Tìm kiếm sản phẩm theo ID
        $sanpham = sanpham::findOrFail($id);

        // Xóa sản phẩm
        $sanpham->delete();

        // Chuyển hướng đến trang 'QuanLy_sanpham' và gửi thông báo thành công
        return redirect('QuanLy_sanpham')->with('thongbao', 'Xoá sản phẩm thành công!');
    }








    //tin tức 
    public function QuanLy_tintuc(){
       
        $tintuc  = tintuc::join('users','users.id','=','tintuc.users_id')
                ->select('tintuc.*','users.name')
                ->paginate(10);
        return view('Admin.QuanLy_tintuc', compact('tintuc'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    
    public function tintuc_them(Request $request)
    {
        $input = $request->all();
        if($AnhTinTuc = $request->file('AnhTinTuc')){
            $destinationPath ='nguoidung/Images/';
            $profileImage = date('YmdHis') . "." . $AnhTinTuc->getClientOriginalExtension();
            $AnhTinTuc->move($destinationPath,$profileImage);
            $input['AnhTinTuc'] = "$profileImage";
        }
        tintuc::create($input);
        return redirect('QuanLy_tintuc')->with('thongbao', 'Thêm liên hệ  sản phẩm thành công!');
    }
    public function tintuc_update($ma)
    {   
        $tintuc = tintuc::find($ma);
        return view('Admin/QuanLy_tintuc_update', compact('tintuc'));
    }
    public function tintuc_sua(Request $request, $ma)
    {   
        $input = $request->all();
        if($AnhTinTuc = $request->file('AnhTinTuc')){
            $destinationPath ='nguoidung/Images/';
            $profileImage = date('YmdHis') . "." . $AnhTinTuc->getClientOriginalExtension();
            $AnhTinTuc->move($destinationPath,$profileImage);
            $input['AnhTinTuc'] = "$profileImage";
        }
        else{
            unset($input['AnhTinTuc']);
        }

        $tintuc = tintuc::find($ma);
        $tintuc -> update($input);
        return redirect('QuanLy_tintuc')->with('thongbao', 'Sửa tin tức thành công!');
    }
    public function tintuc_xoa($id)
    {
        $tintuc = tintuc::findOrFail($id);
        $tintuc -> delete();
        return redirect('QuanLy_tintuc')->with('thongbao', 'Xoá tintuc thành công!');
    }    







    //Hóa đơn nhập 
    public function QuanLy_HoaDonNhap()
    {
        $listHDN = hoadonnhap::paginate(20);
        return view('Admin/QuanLy_HoaDonNhap', compact('listHDN'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    public function HoaDonNhap_detail($id){
        $cthdn = hoadonnhap::limit(10)->join('chitiethoadonnhap','hoadonnhap.id','=','chitiethoadonnhap.hoadonnhap_id')
                    -> select('chitiethoadonnhap.*','hoadonnhap.id')
                    ->where('hoadonnhap.id', $id)
                    ->limit(10)
                    ->get();
        
        return view('Admin/HoaDonNhap_detail', [ 'cthdn' => $cthdn]);

    }
    public function HoaDonNhap_create() {
        $nhacungcap = DB::table('nhacungcap')->pluck('TenNhaCungCap', 'id');
        return view('Admin/QuanLy_HoaDonNhap_them',compact('nhacungcap'));
    }
    public function HoaDonNhap_them(Request $request)
    {
        $hoadonnhap = hoadonnhap::create([
            'nhacungcap_id' => $request->input('nhacungcap_id'),
            'users_id'=> $request->input('users_id'),
        ]);
        $chitiethoadonnhapData = $request->input('chitiethoadonnhap');

        foreach ($chitiethoadonnhapData as $item) {
            $chitiethoadonnhap = new chitiethoadonnhap([
                'hoadonnhap_id' => $hoadonnhap->id,
                'sanpham_id' => $item['sanpham_id'],
                'SoLuong' => $item['SoLuong'],
                'GiaTien' => $item['GiaTien']
            ]);
            $chitiethoadonnhap->save();
        }

        return redirect('QuanLy_HoaDonNhap')->with('thongbao', 'Thêm hóa đơn nhập thành công!');
    }
    public function HoaDonNhap_update($ma)
    {   
        $hoadonnhap = hoadonnhap::findOrFail($ma);
        $allChitiethoadonnhap = chitiethoadonnhap::where('hoadonnhap_id', $ma)->get();

        return view('Admin/QuanLy_HoaDonNhap_update', compact('hoadonnhap', 'allChitiethoadonnhap'));
    }
    public function HoaDonNhap_sua(Request $request, $id)
    {
        // Tìm kiếm kho với ID được chỉ định, nếu không tìm thấy, ném ra ngoại lệ
        $hoadonnhap = hoadonnhap::findOrFail($id);

         // Cập nhật thông tin của hóa đơn nhập với dữ liệu từ request
        $hoadonnhap->update([
            'nhacungcap_id' => $request->input('nhacungcap_id'),
            'users_id' => $request->input('users_id')
        ]);

        // Lấy tất cả các chi tiết kho của kho hiện tại
        $allChitiethoadonnhap = chitiethoadonnhap::where('hoadonnhap_id', $id)->get();

        // Xử lý các chi tiết kho đã tồn tại
        foreach ($allChitiethoadonnhap as $chitiethoadonnhap) {
            $chitiethoadonnhapId = $chitiethoadonnhap->id;
            if ($request->has('delete_chitiethoadonnhap_'.$chitiethoadonnhapId)) {
                // Nếu request có chứa khóa delete_chitiethoadonnhap_{chitiethoadonnhapId}, xóa chi tiết hóa đơn nhập
                $chitiethoadonnhap->delete();
            } else {
                // Ngược lại, cập nhật thông tin của chi tiết hóa đơn nhập
                $chitiethoadonnhap->update([
                    'sanpham_id' => $request->input('sanpham_id_'.$chitiethoadonnhapId),
                    'SoLuong' => $request->input('SoLuong_'.$chitiethoadonnhapId),
                    'GiaTien' => $request->input('GiaTien_'.$chitiethoadonnhapId)
                ]);
            }
        }

        // Xử lý các chi tiết kho mới được thêm
        $newChitiethoadonnhapItems = $request->input('new_chitiethoadonnhap', []);
        foreach ($newChitiethoadonnhapItems as $index => $newChitiethoadonnhap) {
            // Tạo mới một chi tiết kho và lưu vào cơ sở dữ liệu
            chitiethoadonnhap::create([
                'hoadonnhap_id' => $id,
                'sanpham_id' => $newChitiethoadonnhap['sanpham_id'],
                'SoLuong' => $newChitiethoadonnhap['SoLuong'],
                'GiaTien' => $newChitiethoadonnhap['GiaTien']
            ]);
        }
        return redirect('QuanLy_HoaDonNhap')->with('thongbao', 'Sửa HDN thành công!');
    }

    public function HoaDonNhap_xoa($id)
    {

        chitiethoadonnhap::where('hoadonnhap_id', $id)->delete();
        hoadonnhap::destroy($id);
        return redirect('QuanLy_HoaDonNhap')->with('thongbao', 'Xoá HDN thành công!');
    } 






    //Kho
    public function QuanLy_kho()
    {
        $listkho = Kho::paginate(20);
        return view('Admin/QuanLy_Kho', compact('listkho'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    public function kho_detail($id){
        $ctkho = Kho::limit(10)->join('chitietkho','kho.id','=','chitietkho.kho_id')
                    -> select('chitietkho.*','kho.id')
                    ->where('kho.id', $id)
                    ->limit(10)
                    ->get();
        
        return view('Admin/kho_detail', [ 'ctkho' => $ctkho]);

    }
    
    public function kho_create() {
        return view('Admin/QuanLy_kho_them');
    }
    public function kho_them(Request $request)
    {
        // Tạo một đối tượng Kho mới và lưu thông tin được gửi qua $request
        $kho = Kho::create($request->all());

        // Lấy dữ liệu chi tiết kho từ $request
        $chitietkhoData = $request->input('chitietkho');

        // Lặp qua mỗi phần tử trong dữ liệu chi tiết kho
        foreach ($chitietkhoData as $item) {
            // Tạo một đối tượng chitietkho mới với các thông tin được lấy từ mảng $item
            $chitietkho = new chitietkho([
                'kho_id' => $kho->id,
                'sanpham_id' => $item['sanpham_id'],
                'SoLuong' => $item['SoLuong']
            ]);

            // Lưu đối tượng chitietkho vào cơ sở dữ liệu
            $chitietkho->save();
        }

        // Chuyển hướng đến trang 'QuanLy_Kho' và gửi thông báo thành công
        return redirect('QuanLy_Kho')->with('thongbao', 'Thêm kho thành công!');
    }

    public function kho_update($ma)
    {   
        // Tìm kiếm kho với mã được chỉ định, nếu không tìm thấy, ném ra ngoại lệ
        $kho = Kho::findOrFail($ma);

        // Lấy tất cả các chi tiết kho của kho hiện tại
        $allChitietkho = chitietkho::where('kho_id', $ma)->get();

        // Trả về view 'Admin/QuanLy_kho_update' với dữ liệu kho và danh sách chi tiết kho
        return view('Admin/QuanLy_kho_update', compact('kho', 'allChitietkho'));
    }
    public function kho_sua(Request $request, $id)
    {
        // Tìm kiếm kho với ID được chỉ định, nếu không tìm thấy, ném ra ngoại lệ
        $kho = Kho::findOrFail($id);

        // Cập nhật thông tin của kho với dữ liệu từ request
        $kho->update([
            'TenKho' => $request->input('TenKho'),
            'DiaChi' => $request->input('DiaChi')
        ]);

        // Lấy tất cả các chi tiết kho của kho hiện tại
        $allChitietkho = chitietkho::where('kho_id', $id)->get();

        // Xử lý các chi tiết kho đã tồn tại
        foreach ($allChitietkho as $chitietkho) {
            $chitietkhoId = $chitietkho->id;
            if ($request->has('delete_chitietkho_'.$chitietkhoId)) {
                // Nếu request có chứa khóa delete_chitietkho_{chitietkhoId}, xóa chi tiết kho
                $chitietkho->delete();
            } else {
                // Ngược lại, cập nhật thông tin của chi tiết kho
                $chitietkho->update([
                    'sanpham_id' => $request->input('sanpham_id_'.$chitietkhoId),
                    'SoLuong' => $request->input('SoLuong_'.$chitietkhoId)
                ]);
            }
        }

        // Xử lý các chi tiết kho mới được thêm
        $newChitietkhoItems = $request->input('new_chitietkho', []);
        foreach ($newChitietkhoItems as $index => $newChitietkho) {
            // Tạo mới một chi tiết kho và lưu vào cơ sở dữ liệu
            chitietkho::create([
                'kho_id' => $id,
                'sanpham_id' => $newChitietkho['sanpham_id'],
                'SoLuong' => $newChitietkho['SoLuong']
            ]);
        }
        return redirect('QuanLy_Kho')->with('thongbao', 'Sửa kho thành công!');
    }


    public function kho_xoa($id)
    {

        chitietkho::where('kho_id', $id)->delete();
        Kho::destroy($id);
        return redirect('QuanLy_Kho')->with('thongbao', 'Xoá kho thành công!');
    } 









    //loai san pham 

    public function QuanLy_loaisp()
    {
        $listloai =  Loaisanpham::select('loaisanpham.id','loaisanpham.TenLoaiSanPham')
        ->paginate(10);
        if($key = request()->key){
            $listloai = Loaisanpham::select('loaisanpham.id','loaisanpham.TenLoaiSanPham')
            ->where ('TenLoaiSanPham','like','%'.$key.'%')
            ->paginate(5);
        }
        return view('Admin.QuanLy_loaisp', compact('listloai'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    public function loaisp_them(Request $request)
    {
        Loaisanpham::create($request->all());
        return redirect('QuanLy_loaisp')->with('thongbao', 'Thêm loại sản phẩm thành công!');
    }
    public function loaisp_update($ma)
    {   
        $loaisp = Loaisanpham::find($ma);
        return view('Admin/QuanLy_loaisp_update', compact('loaisp'));
    }
    public function loaisp_sua(Request $request, $ma)
    {   
        $loaisp = Loaisanpham::find($ma);
        $loaisp -> update($request->all());
        return redirect('QuanLy_loaisp')->with('thongbao', 'Sửa loại sản phẩm  thành công!');
    }
    public function loaisp_xoa($id)
    {
        $loaisp = Loaisanpham::findOrFail($id);
        $loaisp -> delete();
        return redirect('QuanLy_loaisp')->with('thongbao', 'Xoá loại sản phẩn thành công!');
    }    
    public function QuanLy_gioithieu(){
        $gioithieu = Gioithieu::all();
        return view('Admin.QuanLy_gioithieu')->with('gioithieu',$gioithieu);
    }






    // thông số 
    public function QuanLy_thongso(){
        $thongso = ThongSoKyThuat::join('sanpham','sanpham.id','=','thongsosanpham.sanpham_id')
        ->select('thongsosanpham.id','thongsosanpham.TenThongSo','thongsosanpham.MoTaThongTin','sanpham.TenSP')
        ->paginate(10);
        $sanpham = DB::table('sanpham')->pluck('TenSP', 'id');
        return view('Admin.QuanLy_thongso',compact('thongso','sanpham'))->with('thongso',$thongso);
    }
    public function thongso_them(Request $request)
    {
        ThongSoKyThuat::create($request->all());
        return redirect('QuanLy_thongso')->with('thongbao', 'Thêm thông số  thành công!');
    }
    public function thongso_update($ma)
    {   
        $thongso = ThongSoKyThuat::find($ma);
        $sanpham = DB::table('sanpham')->pluck('TenSP', 'id');
        return view('Admin/QuanLy_thongso_update', compact('thongso','sanpham'));
    }
    public function thongso_sua(Request $request, $ma)
    {   
        $thongso = ThongSoKyThuat::find($ma);
        $thongso -> update($request->all());
        return redirect('QuanLy_thongso')->with('thongbao', 'Sửa thông số  thành công!');
    }
    public function thongso_xoa($id)
    {
        $thongso = ThongSoKyThuat::findOrFail($id);
        $thongso -> delete();
        return redirect('QuanLy_thongso')->with('thongbao', 'Xoá thông số  thành công!');
    }





    //---------------thương hiệu -------------------------------------------------------

    public function QuanLy_thuonghieu(){
       
        $listthuonghieu  = ThuongHieu::paginate(10);
        return view('Admin.QuanLy_thuonghieu', compact('listthuonghieu'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    public function thuonghieu_them(Request $request)
    {
        ThuongHieu::create($request->all());
        return redirect('QuanLy_thuonghieu')->with('thongbao', 'Thêm thương hiệu thành công!');
    }
    public function thuonghieu_update($ma)
    {   
        $thuonghieu = ThuongHieu::find($ma);
        return view('Admin/QuanLy_thuonghieu_update', compact('thuonghieu'));
    }
    public function thuonghieu_sua(Request $request, $ma)
    {   
        $thuonghieu = ThuongHieu::find($ma);
        $thuonghieu -> update($request->all());
        return redirect('QuanLy_thuonghieu')->with('thongbao', 'Sửa thương hiệu  thành công!');
    }
    public function thuonghieu_xoa($id)
    {
        $thuonghieu = ThuongHieu::findOrFail($id);
        $thuonghieu -> delete();
        return redirect('QuanLy_thuonghieu')->with('thongbao', 'Xoá thương hiệu thành công!');
    }    






    //menu 
    public function QuanLy_menu(){
        $listmenu = menu::paginate(20);
        return view('Admin.QuanLy_menu', compact('listmenu'))->with('i', (request()->input('page', 1) -1) * 20);
    }

    public function menu_them(Request $request) {
        $menu = new Menu();
        $menu->MaMenuCha = $request->input('MaMenuCha');
        $menu->TenMenu = $request->input('TenMenu');
        $menu->STT = $request->input('STT');
        $menu->link = $request->input('link');
        $menu->save();
    
        return redirect('QuanLy_menu')->with('thongbao', 'Thêm menu thành công!');
    }
    public function menu_update($ma)
    {   
        $menu = menu::find($ma);
        return view('Admin/QuanLy_menu_update', compact('menu'));
    }
    public function menu_sua(Request $request, $ma)
    {   
        $menu = menu::find($ma);
        $menu -> update($request->all());
        return redirect('QuanLy_menu')->with('thongbao', 'Sửa menu  thành công!');
    }

    public function menu_xoa($id)
    {
        $menu = menu::findOrFail($id);
        $menu -> delete();
        return redirect('QuanLy_menu')->with('thongbao', 'Xoá menu thành công!');
    }








    //người dùng 
    public function QuanLy_nguoidung(){
        $nguoidung =  User::select('users.*')
        ->paginate(10);
        return view('Admin.QuanLy_nguoidung', compact('nguoidung'))->with('i', (request()->input('page', 1) -1) * 20);
    }

    public function nguoidung_them(Request $request) {
        // Lấy tất cả dữ liệu nhập vào từ request
        $input = $request->all();
    
        // Kiểm tra xem có file avatar được tải lên không
        if($avatar = $request->file('avatar')){
            // Định nghĩa đường dẫn đích cho file avatar
            $destinationPath ='nguoidung/Images/avatar';
    
            // Tạo tên file duy nhất cho avatar bằng cách sử dụng ngày giờ hiện tại
            $profileImage = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
    
            // Di chuyển file avatar vào đường dẫn đích
            $avatar->move($destinationPath,$profileImage);
    
            // Gán tên file avatar đã tạo vào input
            $input['avatar'] = "$profileImage";
        }
    
        // Tạo người dùng mới với dữ liệu nhập vào
        User::create($input);
    
        // Chuyển hướng về trang 'QuanLy_nguoidung' và gắn thông báo thành công
        return redirect('QuanLy_nguoidung')->with('thongbao', 'Thêm người dùng thành công!');
    }    
    
    public function nguoidung_update($ma)
    {   
        $nguoidung = User::find($ma);
        return view('Admin/QuanLy_nguoidung_update', compact('nguoidung'));
    }
    public function nguoidung_sua(Request $request, $ma)
    {   
        $input = $request->all();
        if($avatar = $request->file('avatar')){
            $destinationPath ='nguoidung/Images/avatar';
            $profileImage = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            $avatar->move($destinationPath,$profileImage);
            $input['avatar'] = "$profileImage";
        }
        else{
            unset($input['avatar']);
        }

        $nguoidung = User::find($ma);
        $nguoidung -> update($input);
        return redirect('QuanLy_nguoidung')->with('thongbao', 'Sửa người dùng thành công!');
    }

    public function nguoidung_xoa($id)
    {
        $nguoidung = User::findOrFail($id);
        
        // Kiểm tra xem người dùng đang đăng nhập có trùng với người dùng cần xóa không
        if ($nguoidung->id === Auth::id()) {
            return redirect('QuanLy_nguoidung')->with('thongbao', 'Bạn không có quyền xóa chính mình!');
        }
        
        $nguoidung->delete();
        return redirect('QuanLy_nguoidung')->with('thongbao', 'Xoá người dùng thành công!');
    }

    //--------------------------------------------------------------





    
    public function QuanLy_slide(){
        return view('Admin.QuanLy_slide');
    }

    // liên hệ 
    public function QuanLy_lienhe(){
        $listlh = Lienhe::paginate(20);
        return view('Admin.QuanLy_lienhe', compact('listlh'))->with('i', (request()->input('page', 1) -1) * 20);
    }
    public function lienhe_them(Request $request)
    {
        Lienhe::create($request->all());
        return redirect('QuanLy_lienhe')->with('thongbao', 'Thêm liên hệ  sản phẩm thành công!');
    }
    public function lienhe_update($ma)
    {   
        $lienhe = Lienhe::find($ma);
        return view('Admin/QuanLy_lienhe_update', compact('lienhe'));
    }
    public function lienhe_sua(Request $request, $ma)
    {   
        $lienhe = Lienhe::find($ma);
        $lienhe -> update($request->all());
        return redirect('QuanLy_lienhe')->with('thongbao', 'Sửa liên hệ  thành công!');
    }
    public function lienhe_xoa($id)
    {
        $lienhe = Lienhe::findOrFail($id);
        $lienhe -> delete();
        return redirect('QuanLy_lienhe')->with('thongbao', 'Xoá liên hệ  thành công!');
    }




    //Nha Cung Cap
    public function QuanLy_NCC(){
        $listncc = NhaCungCap::paginate(20);
        return view('Admin.QuanLy_NCC', compact('listncc'))->with('i', (request()->input('page', 1) -1) * 20);
    }
    public function ncc_them(Request $request)
    {
        NhaCungCap::create($request->all());
        return redirect('QuanLy_NCC')->with('thongbao', 'Thêm nha cung cap thành công!');
    }
    public function ncc_xoa($id)
    {
        $ncc = NhaCungCap::findOrFail($id);
        $ncc -> delete();
        return redirect('QuanLy_NCC')->with('thongbao', 'Xoá nhà cung cấp thành công!');
    }






    // đơn hàng 
    public function QuanLy_donhang(){
        $donhang = donhang::join('khachhang','khachhang.id','=','donhang.khachhang_id')
        ->select('donhang.*','khachhang.TenKhachHang')
        ->paginate(10);
        return view('Admin.QuanLy_donhang',compact('donhang'))->with('i', (request()->input('page', 1) -1) * 10);
    }
    public function donhang_detail($id){
        // Tìm kiếm các chi tiết đơn hàng dựa trên ID đơn hàng
        $ctdonhang = donhang::limit(10)->join('chitietdonhang','donhang.id','=','chitietdonhang.donhang_id')
                    ->select('chitietdonhang.*','donhang.id')
                    ->where('donhang.id', $id) // được sử dụng để lọc các chi tiết đơn hàng theo ID đơn hàng
                    ->get();
        // Trả về view 'Admin/donhang_detail' và truyền biến $ctdonhang vào view
        return view('Admin/donhang_detail', ['ctdonhang' => $ctdonhang]);
    }    
    public function duyetDonHang($id)
    {
         // Tìm kiếm đơn hàng theo ID
         $donhang = DonHang::find($id);

         // Cập nhật trạng thái của đơn hàng thành true (đã duyet)
         $donhang->TrangThai = True;
 
         // Lưu các thay đổi vào cơ sở dữ liệu
         $donhang->save();
        // Chuyển hướng đến trang 'QuanLy_donhang'
        return redirect('QuanLy_donhang');
    }

    public function huyDonHang($id)
    {
        // Tìm kiếm đơn hàng theo ID
        $donhang = DonHang::find($id);

        // Cập nhật trạng thái của đơn hàng thành 2 (đã hủy)
        $donhang->TrangThai = 2;

        // Lưu các thay đổi vào cơ sở dữ liệu
        $donhang->save();

        // Chuyển hướng đến trang 'QuanLy_donhang'
        return redirect('QuanLy_donhang');
    }




    //giảm giá 
    public function QuanLy_giamgia(){
        $giamgia = GiamGia::paginate(20);
        $sanpham = DB::table('sanpham')->pluck('TenSP', 'id');
        return view('Admin/QuanLy_giamgia', compact('giamgia','sanpham'))->with('i', (request()->input('page', 1) -1) * 20);
    }

    public function giamgia_them(Request $request) {
        $giamgia = new GiamGia();
        $giamgia->sanpham_id = $request->input('sanpham_id');
        $giamgia->PhanTramGiamGia = $request->input('PhanTramGiamGia');
        $giamgia->ThoiGianBatDau = Carbon::parse($giamgia->ThoiGianBatDau)->format('d-m-Y');
        $giamgia->ThoiGianKetThuc = Carbon::parse($giamgia->ThoiGianKetThuc)->format('d-m-Y');
        $giamgia->TrangThai = $request->input('TrangThai') ? 1 : 0;
        $giamgia->save();
    
        return redirect('QuanLy_giamgia')->with('thongbao', 'Thêm giảm giá thành công!');
    }
    public function giamgia_update($ma)
    {   
        $giamgia = GiamGia::find($ma);
        $sanpham = DB::table('sanpham')->pluck('TenSP', 'id');
        return view('Admin/QuanLy_giamgia_update', compact('giamgia','sanpham'));
    }
    public function giamgia_sua(Request $request, $ma)
    {   
        $giamgia = GiamGia::find($ma);
        $giamgia -> update($request->all());
        return redirect('QuanLy_giamgia')->with('thongbao', 'Sửa giảm giá thành công!');
    }

    public function giamgia_xoa($id)
    {
        $giamgia = GiamGia::findOrFail($id);
        $giamgia -> delete();
        return redirect('QuanLy_giamgia')->with('thongbao', 'Xoá menu thành công!');
    }



    
    //Giá sản phẩm 
    public function QuanLy_gia(){
        $listgia = Gia::paginate(20);
        $sanpham = DB::table('sanpham')->pluck('TenSP', 'id');
        return view('Admin.QuanLy_gia', compact('listgia','sanpham'))->with('i', (request()->input('page', 1) -1) * 20);
    }
    public function gia_them(Request $request)
    {
        Gia::create($request->all());
        return redirect('QuanLy_gia')->with('thongbao', 'Thêm giá thành công!');
    }
    public function gia_update($ma)
    {   
        $gia = Gia::find($ma);
        $sanpham = DB::table('sanpham')->pluck('TenSP', 'id');
        return view('Admin/QuanLy_gia_update', compact('gia','sanpham'));
    }
    public function gia_sua(Request $request, $ma)
    {   
        $gia = Gia::find($ma);
        $gia -> update($request->all());
        return redirect('QuanLy_gia')->with('thongbao', 'Sửa giá thành công!');
    }
    public function gia_xoa($id)
    {
        $gia = Gia::findOrFail($id);
        $gia -> delete();
        return redirect('QuanLy_gia')->with('thongbao', 'Xoá giá thành công!');
    }
}
