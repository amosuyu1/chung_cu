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


                        <h3 class="profile-username text-center">{{ $news->tieude }}</h3>
                        <h4 class="profile-username text-center">{{ $news->slug }}</h4>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Lượt xem</b> <span class="float-right text-primary">{{ $news->luotxem }}</span>
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
                                    <img id="main-product-image" src="{{ asset($news->hinhanh) }}"
                                        class="product-image" alt="Product Image">
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">

                                {!! $news->noidung !!}
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
