@extends('nguoidung/layout')
@section('nguoidung/content')
<div class="intro-container">
    @foreach ($db as $item)
    <h1 class="intro-title" style="text-align: center;">{{$item->TieuDe}}</h1>
    <p class="intro-description">{{$item->NoiDung}}</p>
    @if($item->Anh != null)
    <div class="intro-image-container" >
      <img src="/nguoidung/Images/{{$item->Anh}}" alt="Introduction image" class="intro-image">
    </div>
    @endif
    @endforeach
</div>
  
@endsection 

