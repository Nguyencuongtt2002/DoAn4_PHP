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
                            <form class="form-horizontal row-border" action="/kho_them" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Tên kho</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="TenKho" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="input17">Địa Chỉ</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="DiaChi" />
                                        </div>
                                    </div>
                                    <div id="chitietkho-container">
                                        <div class="chitietkho-group">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="input17">Mã Sản phẩm</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="chitietkho[0][sanpham_id]" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="input17">Số Lượng</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="chitietkho[0][SoLuong]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-7">
                                            <button class="btn btn-primary mt-2" type="button" id="add-chitietkho-btn">Thêm chi tiết kho</button>
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
    // Chờ cho tài liệu HTML hoàn toàn được tải và phân tích xong
        document.addEventListener('DOMContentLoaded', function() {

            // Lấy phần tử nút "Thêm chi tiết kho"
            const addChitietkhoBtn = document.getElementById('add-chitietkho-btn');

            // Lấy phần tử chứa chi tiết kho
            const chitietkhoContainer = document.getElementById('chitietkho-container');

            // Khởi tạo chỉ số cho chi tiết kho
            let chitietkhoIndex = 1;

            // Thêm sự kiện click cho nút "Thêm chi tiết kho"
            addChitietkhoBtn.addEventListener('click', function() {

            // Tạo phần tử div để chứa chi tiết kho
            const chitietkhoGroup = document.createElement('div');
            chitietkhoGroup.classList.add('chitietkho-group');

            // Tạo phần tử div để chứa mã Sản phẩm
            const maSanPhamGroup = document.createElement('div');
            maSanPhamGroup.classList.add('form-group');

            // Tạo phần tử label để hiển thị nhãn "Mã Sản phẩm"
            const maSanPhamLabel = document.createElement('label');
            maSanPhamLabel.classList.add('col-md-4', 'control-label');
            maSanPhamLabel.textContent = 'Mã Sản phẩm';

            // Tạo phần tử div để chứa input mã Sản phẩm
            const maSanPhamWrapper = document.createElement('div');
            maSanPhamWrapper.classList.add('col-md-7');
            const maSanPhamInput = document.createElement('input');
            maSanPhamInput.setAttribute('type', 'text');
            maSanPhamInput.classList.add('form-control');
            maSanPhamInput.setAttribute('name', `chitietkho[${chitietkhoIndex}][sanpham_id]`);
            maSanPhamWrapper.appendChild(maSanPhamInput);

            // Gắn nhãn "Mã Sản phẩm" và input vào phần tử chứa mã Sản phẩm
            maSanPhamGroup.appendChild(maSanPhamLabel);
            maSanPhamGroup.appendChild(maSanPhamWrapper);

            // Tạo phần tử div để chứa Số Lượng
            const soLuongGroup = document.createElement('div');
            soLuongGroup.classList.add('form-group');

            // Tạo phần tử label để hiển thị nhãn "Số Lượng"
            const soLuongLabel = document.createElement('label');
            soLuongLabel.classList.add('col-md-4', 'control-label');
            soLuongLabel.textContent = 'Số Lượng';

            // Tạo phần tử div để chứa input Số Lượng
            const soLuongWrapper = document.createElement('div');
            soLuongWrapper.classList.add('col-md-7');
            const soLuongInput = document.createElement('input');
            soLuongInput.setAttribute('type', 'text');
            soLuongInput.classList.add('form-control');
            soLuongInput.setAttribute('name', `chitietkho[${chitietkhoIndex}][SoLuong]`);
            soLuongWrapper.appendChild(soLuongInput);

            // Gắn nhãn "Số Lượng" và input vào phần tử chứa Số Lượng
            soLuongGroup.appendChild(soLuongLabel);
            soLuongGroup.appendChild(soLuongWrapper);

            // Gắn phần tử chứa mã Sản phẩm và phần tử chứa Số Lượng vào phần tử chứa chi tiết kho
            chitietkhoGroup.appendChild(maSanPhamGroup);
            chitietkhoGroup.appendChild(soLuongGroup);

            // Gắn phần tử chi tiết kho vào phần tử chứa chi tiết kho chính
            chitietkhoContainer.appendChild(chitietkhoGroup);

            // Tăng chỉ số cho chi tiết kho
            chitietkhoIndex++;
            });
        });

</script>  
@endsection