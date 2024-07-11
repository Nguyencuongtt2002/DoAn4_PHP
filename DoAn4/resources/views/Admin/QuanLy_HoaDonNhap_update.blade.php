@extends('Admin.layout')
@section('Admin.content')
<div class="container body">
    @include('Admin.menuleft')
    @include('Admin.menutop')
    <div class="right_col" role="main">
        <div class="">
            <div class="row" ng-app="myApp" ng-controller="LoaiSPAdController">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Sửa HĐN và chi tiết HĐN <small></small></h2>
                            <form class="form-horizontal row-border" action="/HoaDonNhap_sua/{{$hoadonnhap->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mã NCC</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="nhacungcap_id" value="{{$hoadonnhap->nhacungcap_id}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mã ND</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="users_id" value="{{$hoadonnhap->users_id}}" />
                                        </div>
                                    </div>
                            
                                    <div id="chitiethoadonnhap-container">
                                        @foreach($allChitiethoadonnhap as $chitiethoadonnhap)
                                            <div class="chitiethoadonnhap-item">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="input17">Mã Sản Phẩm </label>
                                                    <div class="col-md-7"> 
                                                        <input type="text" class="form-control" name="sanpham_id_{{$chitiethoadonnhap->id}}" value="{{$chitiethoadonnhap->sanpham_id}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="input17">Số Lượng </label>
                                                    <div class="col-md-7"> 
                                                        <input type="text" name="SoLuong_{{$chitiethoadonnhap->id}}" class="form-control" value="{{$chitiethoadonnhap->SoLuong}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="input17">Giá Tiền</label>
                                                    <div class="col-md-7"> 
                                                        <input type="text" name="GiaTien_{{$chitiethoadonnhap->id}}" class="form-control" value="{{$chitiethoadonnhap->GiaTien}}" />
                                                    </div>
                                                </div>
                                                <input type="checkbox" name="delete_chitiethoadonnhap_{{ $chitiethoadonnhap->id }}"> Xóa chi tiết HDN
                                            </div>
                                        @endforeach
                                    </div>
                            
                                    <div class="form-group">
                                        <div class="col-md-7 col-md-offset-4">
                                            <button type="button" class="btn btn-primary" id="add-chitiethoadonnhap">Thêm Chi Tiết HDN</button>
                                        </div>
                                    </div>
                            
                                    <input type="submit" value="Save" class="btn btn-success" style="background-color: aquamarine; color: black">
                                </div>
                            </form>                                               
                        </div>     
                        </div>
                        <div class="x_content">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var addChitiethoadonnhapButton = document.getElementById('add-chitiethoadonnhap');
      var chitiethoadonnhapContainer = document.getElementById('chitiethoadonnhap-container');
      var chitiethoadonnhapCount = document.getElementsByClassName('chitiethoadonnhap-item').length;
  
      addChitiethoadonnhapButton.addEventListener('click', function() {
          chitiethoadonnhapCount++;
  
          var chitiethoadonnhapItem = document.createElement('div');
          chitiethoadonnhapItem.className = 'chitiethoadonnhap-item';
  
          var chitiethoadonnhapForm = `
              <div class="form-group">
                  <label class="col-md-4 control-label" for="input17">Mã Sản Phẩm </label>
                  <div class="col-md-7"> 
                      <input type="text" class="form-control" name="new_chitiethoadonnhap[${chitiethoadonnhapCount}][sanpham_id]" placeholder="Mã Sản Phẩm">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label" for="input17">Số Lượng </label>
                  <div class="col-md-7"> 
                      <input type="text"  name="new_chitiethoadonnhap[${chitiethoadonnhapCount}][SoLuong]" class="form-control" placeholder="Số Lượng">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label" for="input17">Giá Tiền</label>
                  <div class="col-md-7"> 
                      <input type="text"  name="new_chitiethoadonnhap[${chitiethoadonnhapCount}][GiaTien]" class="form-control" placeholder="Giá Tiền">
                  </div>
              </div>
              <input type="checkbox" name="delete_chitiethoadonnhap_${chitiethoadonnhapCount}"> Xóa chi tiết HDN
          `;
  
          chitiethoadonnhapItem.innerHTML = chitiethoadonnhapForm;
          chitiethoadonnhapContainer.appendChild(chitiethoadonnhapItem);
      });
  });
  </script>

@endsection