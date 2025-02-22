@extends('adminlte::page')

@section('title', 'Thêm căn hộ')

@section('content_header')
    <h1>Thêm căn hộ</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div>
            <div class="container-fluid">

                @if (session('success'))
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        <div class="alert alert-primary alert-dismissible fade show center" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('news.store') }}" class="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- start Basic Area Chart -->
                    <div class="row">
                        <div class="col-lg-8 ">
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-4">
                                        <label class="form-label">Tên tiêu đề<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Nhập thông tin"
                                            name="tieude">
                                    </div>
                                    <div>
                                        <label class="form-label">Nội dung</label>
                                        <!-- Summernote editor -->
                                        <textarea id="summernote" name="noidung"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions mb-5">
                                <button type="submit" class="btn btn-success m-t-20">
                                    <i class="fa fa-envelope-o"></i> Thêm mới
                                </button>
                                <a href="/apartment" class="btn btn-inverse m-t-20">
                                    <i class="fa fa-times"></i>Hủy
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight"
                                aria-labelledby="offcanvasRightLabel">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Thêm ảnh <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group mb-3">
                                            {{-- <input type="file" class="form-control" name="images[]" multiple> --}}
                                            <input type="file" class="form-control" id="imageInput" name="hinhanh"
                                                onchange="previewImages(event)">

                                            <div id="imagePreviews" class="row"></div>
                                        </div>
                                        <p class="fs-2 text-center mb-0">
                                            Đặt hình ảnh thu nhỏ của sản phẩm. Chỉ chấp nhận các tệp hình ảnh *.png, *.jpg
                                            và *.jpeg.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    <!-- end Basic Area Chart -->

                </form>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">

@stop

@section('js')
    <!-- jQuery, Bootstrap và AdminLTE JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


    <script>
            $(document).ready(function() {
                // Summernote
                $('#summernote').summernote();
                // Hàm để hiển thị ảnh preview
                window.previewImages = function(event) {
                    const file = event.target.files[0]; // Chỉ lấy ảnh đầu tiên
                    const previewsContainer = document.getElementById('imagePreviews');
                    previewsContainer.innerHTML = ''; // Xóa tất cả ảnh trước đó

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function() {
                            // Tạo thẻ div để bao quanh ảnh
                            const imageWrapper = document.createElement('div');
                            imageWrapper.classList.add('col-md-12', 'mb-2');

                            const img = document.createElement('img');
                            img.src = reader.result;
                            img.classList.add('img-thumbnail');
                            img.style.width = '100%';
                            img.style.height = 'auto';

                            // Thêm ảnh vào div và div vào container
                            imageWrapper.appendChild(img);
                            previewsContainer.appendChild(imageWrapper);
                        };

                        reader.readAsDataURL(file); // Đọc ảnh dưới dạng data URL
                    }
                };
            });
    </script>


@stop
@section('plugins.Datatables', true)
