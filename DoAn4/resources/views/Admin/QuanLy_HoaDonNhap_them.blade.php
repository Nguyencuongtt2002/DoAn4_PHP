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
                            <h2>thêm kho<small></small></h2>
                            <form class="form-horizontal row-border" action="/HoaDonNhap_them" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mã Nhà Cung Cấp</label>
                                        <div class="col-md-7"> 
                                            <select class="form-control" name="nhacungcap_id">
                                                @foreach ($nhacungcap as $id => $TenNhaCungCap)
                                                    <option value="{{$id}}">{{$TenNhaCungCap}}</option>
                                                @endforeach
                                            </select>
                                        </div>      
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Mã Người Dùng</label>
                                        <div class="col-md-7"> <input type="text" id="idTenThuongHieu" class="form-control" name="users_id" value="{{Auth::user()->id}}" readonly /></div>
                                    </div>
                                    <div id="chitiethoadonnhap-container">
                                        <div class="chitietkho-group">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="input17">Mã Sản phẩm</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="chitiethoadonnhap[0][sanpham_id]" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="input17">Số Lượng</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="chitiethoadonnhap[0][SoLuong]" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="input17">Giá Tiền</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="chitiethoadonnhap[0][GiaTien]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-7">
                                            <button class="btn btn-primary mt-2" type="button" id="add-chitietkho-btn">Thêm chi tiết HDN</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-7">
                                            <input class="btn btn-success mt-2" type="submit" value="Thêm" />
                                        </div>
                                    </div>
                                </div>
                            </form>                            
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
        const addChitietHDNBtn = document.getElementById('add-chitietkho-btn');
        const chitietHDNContainer = document.getElementById('chitiethoadonnhap-container');
        let chitietHDNIndex = 1;

        addChitietHDNBtn.addEventListener('click', function() {
            const chitietHDNGroup = document.createElement('div');
            chitietHDNGroup.classList.add('chitietkho-group');

            const maSanPhamGroup = document.createElement('div');
            maSanPhamGroup.classList.add('form-group');

            const maSanPhamLabel = document.createElement('label');
            maSanPhamLabel.classList.add('col-md-4', 'control-label');
            maSanPhamLabel.textContent = 'Mã Sản phẩm';

            const maSanPhamWrapper = document.createElement('div');
            maSanPhamWrapper.classList.add('col-md-7');
            const maSanPhamInput = document.createElement('input');
            maSanPhamInput.setAttribute('type', 'text');
            maSanPhamInput.classList.add('form-control');
            maSanPhamInput.setAttribute('name', `chitiethoadonnhap[${chitietHDNIndex}][sanpham_id]`);
            maSanPhamWrapper.appendChild(maSanPhamInput);

            maSanPhamGroup.appendChild(maSanPhamLabel);
            maSanPhamGroup.appendChild(maSanPhamWrapper);

            const soLuongGroup = document.createElement('div');
            soLuongGroup.classList.add('form-group');

            const soLuongLabel = document.createElement('label');
            soLuongLabel.classList.add('col-md-4', 'control-label');
            soLuongLabel.textContent = 'Số Lượng';

            const soLuongWrapper = document.createElement('div');
            soLuongWrapper.classList.add('col-md-7');
            const soLuongInput = document.createElement('input');
            soLuongInput.setAttribute('type', 'text');
            soLuongInput.classList.add('form-control');
            soLuongInput.setAttribute('name', `chitiethoadonnhap[${chitietHDNIndex}][SoLuong]`);
            soLuongWrapper.appendChild(soLuongInput);

            soLuongGroup.appendChild(soLuongLabel);
            soLuongGroup.appendChild(soLuongWrapper);

            const giaTienGroup = document.createElement('div');
            giaTienGroup.classList.add('form-group');

            const giaTienLabel = document.createElement('label');
            giaTienLabel.classList.add('col-md-4', 'control-label');
            giaTienLabel.textContent = 'Giá Tiền';

            const giaTienWrapper = document.createElement('div');
            giaTienWrapper.classList.add('col-md-7');
            const giaTienInput = document.createElement('input');
            giaTienInput.setAttribute('type', 'text');
            giaTienInput.classList.add('form-control');
            giaTienInput.setAttribute('name', `chitiethoadonnhap[${chitietHDNIndex}][GiaTien]`);
            giaTienWrapper.appendChild(giaTienInput);

            giaTienGroup.appendChild(giaTienLabel);
            giaTienGroup.appendChild(giaTienWrapper);

            chitietHDNGroup.appendChild(maSanPhamGroup);
            chitietHDNGroup.appendChild(soLuongGroup);
            chitietHDNGroup.appendChild(giaTienGroup);
            chitietHDNContainer.appendChild(chitietHDNGroup);

            chitietHDNIndex++;
        });
    });
</script>
@endsection