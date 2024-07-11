@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="intro-container">
    @foreach($db as $item)
    <div class="contact-form" >
        <h1>{{$item->CoSoLienHe}}</h1>
        <div class="contact-info"  >
            <p><strong>Địa chỉ:</strong>{{$item->ThongTinLienHe}}</p>
            <p><strong>Điện thoại:</strong>{{$item->SoDienThoai}}</p>
            <p><strong>Email:</strong>{{$item->Email}}</p>
        </div>
        <a href="mailto:contact@website.com" class="contact-button">Liên hệ qua Email</a>
    </div>
    @endforeach
</div>
  
@endsection 

