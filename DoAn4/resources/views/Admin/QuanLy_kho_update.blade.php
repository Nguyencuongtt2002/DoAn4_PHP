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
                            <h2>Sửa kho và chi tiết kho <small></small></h2>
                            <form class="form-horizontal row-border" action="/kho_sua/{{$kho->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Tên kho</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="TenKho" value="{{$kho->TenKho}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Địa chỉ</label>
                                        <div class="col-md-7"> 
                                            <input type="text" class="form-control" name="DiaChi" value="{{$kho->DiaChi}}" />
                                        </div>
                                    </div>
                            
                                    <div id="chitietkho-container">
                                        @foreach($allChitietkho as $chitietkho)
                                            <div class="chitietkho-item">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="input17">Mã Sản Phẩm </label>
                                                    <div class="col-md-7"> 
                                                        <input type="text" class="form-control" name="sanpham_id_{{$chitietkho->id}}" value="{{$chitietkho->sanpham_id}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="input17">Số Lượng </label>
                                                    <div class="col-md-7"> 
                                                        <input type="text" name="SoLuong_{{$chitietkho->id}}" class="form-control" value="{{$chitietkho->SoLuong}}" />
                                                    </div>
                                                </div>
                                                <input type="checkbox" name="delete_chitietkho_{{ $chitietkho->id }}"> Xóa chi tiết kho
                                            </div>
                                        @endforeach
                                    </div>
                            
                                    <div class="form-group">
                                        <div class="col-md-7 col-md-offset-4">
                                            <button type="button" class="btn btn-primary" id="add-chitietkho">Thêm Chi Tiết Kho</button>
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
      var addChitietkhoButton = document.getElementById('add-chitietkho');
      var chitietkhoContainer = document.getElementById('chitietkho-container');
      var chitietkhoCount = 0;
  
      addChitietkhoButton.addEventListener('click', function() {
          chitietkhoCount++;
  
          var chitietkhoItem = document.createElement('div');
          chitietkhoItem.className = 'chitietkho-item';
  
          var chitietkhoForm = `
              <div class="form-group">
                  <label class="col-md-4 control-label" for="input17">Mã Sản Phẩm </label>
                  <div class="col-md-7"> 
                      <input type="text" class="form-control" name="new_chitietkho[${chitietkhoCount}][sanpham_id]" placeholder="ID sản phẩm">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label" for="input17">Số Lượng </label>
                  <div class="col-md-7"> 
                      <input type="text" name="new_chitietkho[${chitietkhoCount}][SoLuong]" class="form-control" placeholder="Số lượng">
                  </div>
              </div>
              <label class="delete-chitietkho-label">
                  <input type="checkbox" name="delete_chitietkho[${chitietkhoCount}]" class="delete-chitietkho-checkbox">
                  Xóa chi tiết kho
              </label>
          `;
  
          chitietkhoItem.innerHTML = chitietkhoForm;
          chitietkhoContainer.appendChild(chitietkhoItem);
      });
  });
  </script>  
@endsection