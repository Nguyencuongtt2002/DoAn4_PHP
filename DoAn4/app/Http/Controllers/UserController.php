<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return view('auth.add');

    }
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:30|alpha',
                'email' => 'required|email',
                'avatar' => 'nullable|image|mimes:jpg,png|max:10000000',
                'role' => 'required|in:1,0',
                'status' => 'required|in:1,0',
            ], [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min ký tự',
                'max' => ':attribute tối đa có thể là :max ký tự',
                'alpha' => ':attribute chỉ được chứa chữ cái',
                'email' => ':attribute không đúng định dạng',
                'image' => ':attribute phải là hình ảnh',
                'mimes' => ':attribute chỉ chấp nhận định dạng :values',
                'in' => ':attribute phải có giá trị :values',
            ], [
                'name' => 'Tên',
                'email' => 'Email',
                'avatar' => 'Ảnh đại diện',
                'role' => 'Quyền',
                'status' => 'Trạng thái',
            ]);            
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        
            $file_Name = null;
        
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $destination_Path = public_path('nguoidung/Images/avatar');
                $file_Name = time() . '_' . $file->getClientOriginalName();
                $file->move($destination_Path, $file_Name);
            }
        
            $user = DB::table('users')->where('email', $request->email)->first();
        
            if (!$user) {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->avatar = $file_Name;
                $newUser->phone = $request->phone;
                $newUser->password = $request->password;
                $newUser->role = $request->role; 
                $newUser->status = $request->status; 
                $newUser->save();
                return redirect()->route('login')->with('message', 'Bạn đã tạo tài khoản thành công, mời bạn đăng nhập');
            } else {
                return redirect()->route('login')->with('message', 'Tài khoản đã tồn tại, mời đăng nhập');
            }
        }        
    }
    public function login(){
        return view('auth.login');
    }
    public function formdangnhap(Request $req){
        $validator = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
    
        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
    
        $remember = $req->remember;
    
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password],$remember)){
            if(Auth::user()->role == 1){
                return redirect()->route('home')->with('message', 'Xin chào ' . Auth::user()->name);
            }
            else if(Auth::user()->role == 0){
                return redirect()->route('QuanLy_sanpham')->with('message', 'Xin chào ' . Auth::user()->name);
            }
            else{
                Auth::logout(); // đăng xuất tài khoản nếu không có vai trò hợp lệ
                return redirect()->route('login')->with('message', 'Bạn không có quyền truy cập trang này. Vui lòng đăng nhập với tài khoản hợp lệ.');
            }
        }
        else{
            return redirect()->back()->with('message','thông tin tài khoản không chính xác');
        }
    }   
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    } 

}
