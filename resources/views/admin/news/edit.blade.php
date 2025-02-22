@extends('adminlte::page')

@section('title', 'Chỉnh sửa chung cư')

@section('content_header')
    <h1>Chỉnh sửa chung cư</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div>
            <div class="container-fluid">

                @if (session('success'))
                    <div class="card-header">
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

                <form method="POST" action="{{ route('building.update', $building->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Tên chung cư<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Nhập thông tin"
                                            name="ten_chung_cu" value="{{ $building->ten_chung_cu }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Địa chỉ<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Nhập địa chỉ"
                                        name="dia_chi" value="{{ $building->ten_chung_cu }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">số tầng<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control"
                                        name="so_tang" value="{{ $building->so_tang }}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-actions mb-5">
                                <button type="submit" class="btn btn-success m-t-20">
                                    <i class="fa fa-save"></i> Lưu thay đổi
                                </button>
                                <a href="/building" class="btn btn-inverse m-t-20">
                                    <i class="fa fa-times"></i> Hủy
                                </a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">
    @stop

    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

        <script>
            $(function() {
                // Khởi tạo Summernote
                $('#summernote').summernote();

                // Hàm previewImages chỉ hiển thị ảnh mới được chọn
                function previewImages(event) {
                    const files = event.target.files;
                    const previewsContainer = document.getElementById('imagePreviews');

                    // Xóa toàn bộ các ảnh hiện có trong container preview (chỉ dành cho ảnh mới)
                    previewsContainer.innerHTML = '';

                    // Duyệt qua từng file được chọn và hiển thị ảnh
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const reader = new FileReader();

                        reader.onload = function() {
                            const imageWrapper = document.createElement('div');
                            imageWrapper.classList.add('col-md-4', 'mb-2'); // Sử dụng lớp Bootstrap cho layout

                            const img = document.createElement('img');
                            img.src = reader.result;
                            img.classList.add('img-thumbnail'); // Thêm viền cho ảnh
                            img.style.width = '100%';
                            img.style.height = 'auto';

                            imageWrapper.appendChild(img);
                            previewsContainer.appendChild(imageWrapper);
                        };

                        if (file) {
                            reader.readAsDataURL(file); // Đọc file dưới dạng data URL
                        }
                    }
                }

                // Gắn sự kiện onchange cho input file để gọi previewImages
                $('input[type="file"]').on('change', previewImages);
            });
        </script>
    @stop
