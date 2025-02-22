@extends('adminlte::page')

@section('title', 'Chi Tiết')

@section('content_header')
    <h1>Chi Tiết</h1>
@stop

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">


                        <h3 class="profile-username text-center">{{ $canHo->ten_can_ho }}</h3>

                        <p class="text-muted text-center">{{ $canHo->building->ten_chung_cu }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Diện tích</b> <span class="float-right text-primary">{{ $canHo->dien_tich }}m2</span>
                            </li>
                            <li class="list-group-item">
                                <b>Mục đích</b> <span class="float-right text-primary">{{ $canHo->muc_dich_text }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Giá bán</b> <span class="float-right text-primary">{{ $canHo->gia }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Giá thuê</b> <span class="float-right text-primary">{{ $canHo->gia_thue }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Phòng ngủ</b> <span class="float-right text-primary">{{ $canHo->so_phong }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Phòng tắm</b> <span class="float-right text-primary">{{ $canHo->phong_tam }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Hướng nhà</b> <span class="float-right text-primary">{{ $canHo->Huong_nha }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Nội thất</b> <span class="float-right text-primary">{{ $canHo->noi_that_text }}</span>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Hình ảnh</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Mô tả</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="col-12">
                                    <img id="main-product-image" src="{{ asset(json_decode($canHo->images, true)[0]) }}"
                                        class="product-image" alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    @foreach (json_decode($canHo->images, true) as $image)
                                        <div class="product-image-thumb {{ $loop->first ? 'active' : '' }}">
                                            <img src="{{ asset($image) }}" alt="Hình ảnh căn hộ" width="150"
                                                onclick="changeMainImage('{{ asset($image) }}')">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">

                                {!! $canHo->mo_ta !!}
                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        function changeMainImage(imageUrl) {
            document.getElementById('main-product-image').src = imageUrl;

            // Xóa class 'active' khỏi tất cả thumbnails
            document.querySelectorAll('.product-image-thumb').forEach(thumb => {
                thumb.classList.remove('active');
            });

            // Thêm class 'active' cho ảnh được click
            event.currentTarget.parentElement.classList.add('active');
        }
    </script>
@stop
@section('plugins.Datatables', true)
