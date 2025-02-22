@extends('adminlte::page')

@section('title', 'Chỉnh sửa căn hộ')

@section('content_header')
    <h1>Chỉnh sửa căn hộ</h1>
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

                <form method="POST" action="{{ route('updateRoom', $room->id) }}" class=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="form-label">Tên tiêu đề<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Nhập thông tin"
                                            name="ten_can_ho" value="{{ $room->ten_can_ho }}">
                                    </div>
                                    <div>
                                        <label class="form-label">Mô tả</label>
                                        <textarea id="summernote" name="mo_ta">{!! $room->mo_ta !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Hướng nhà <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control custom-select" name="Huong_nha">
                                                    <option value="Đông"
                                                        {{ $room->Huong_nha == 'Đông' ? 'selected' : '' }}>Đông</option>
                                                    <option value="Tây"
                                                        {{ $room->Huong_nha == 'Tây' ? 'selected' : '' }}>Tây</option>
                                                    <option value="Nam"
                                                        {{ $room->Huong_nha == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                    <option value="Bắc"
                                                        {{ $room->Huong_nha == 'Bắc' ? 'selected' : '' }}>Bắc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Mục đích<span class="text-danger">*</span></label>
                                                <select class="form-control custom-select" name="muc_dich">
                                                    <option value="0" {{ $room->muc_dich == 0 ? 'selected' : '' }}>Bán
                                                    </option>
                                                    <option value="1" {{ $room->muc_dich == 1 ? 'selected' : '' }}>Thuê
                                                    </option>
                                                    <option value="2" {{ $room->muc_dich == 2 ? 'selected' : '' }}>Bán
                                                        hoặc thuê</option>
                                                    <option value="3" {{ $room->muc_dich == 3 ? 'selected' : '' }}>
                                                        Ngắn hạn</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Diện tích m²<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="dien_tich"
                                                    value="{{ $room->dien_tich }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phòng tắm<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control custom-select" name="phong_tam">
                                                    <option value="1" {{ $room->phong_tam == 1 ? 'selected' : '' }}>1
                                                        phòng tắm</option>
                                                    <option value="2" {{ $room->phong_tam == 2 ? 'selected' : '' }}>2
                                                        phòng tắm</option>
                                                    <option value="3" {{ $room->phong_tam == 3 ? 'selected' : '' }}>3
                                                        phòng tắm</option>
                                                    <option value="4" {{ $room->phong_tam == 4 ? 'selected' : '' }}>4
                                                        phòng tắm</option>
                                                    <option value="5" {{ $room->phong_tam == 5 ? 'selected' : '' }}>5
                                                        phòng tắm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phòng ngủ<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control custom-select" name="so_phong">
                                                    <option value="1" {{ $room->so_phong == 1 ? 'selected' : '' }}>1
                                                        phòng ngủ</option>
                                                    <option value="2" {{ $room->so_phong == 2 ? 'selected' : '' }}>2
                                                        phòng ngủ</option>
                                                    <option value="3" {{ $room->so_phong == 3 ? 'selected' : '' }}>3
                                                        phòng ngủ</option>
                                                    <option value="4" {{ $room->so_phong == 4 ? 'selected' : '' }}>4
                                                        phòng ngủ</option>
                                                    <option value="5" {{ $room->so_phong == 5 ? 'selected' : '' }}>5
                                                        phòng ngủ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Mục đích <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control custom-select" name="muc_dich">
                                                    <option value="0" {{ $room->muc_dich == 0 ? 'selected' : '' }}>Bán</option>
                                                    <option value="1" {{ $room->muc_dich == 1 ? 'selected' : '' }}>Thuê</option>
                                                    <option value="2" {{ $room->muc_dich == 2 ? 'selected' : '' }}>Bán</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Giá bán <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="10 Tỷ"
                                                    name="gia" value="{{ $room->gia }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Giá thuê<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="10tr/tháng"
                                                    name="gia_thue" value="{{ $room->gia_thue }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions mb-5">
                                <button type="submit" class="btn btn-success m-t-20">
                                    <i class="fa fa-save"></i> Lưu thay đổi
                                </button>
                                <a href="/apartment" class="btn btn-inverse m-t-20">
                                    <i class="fa fa-times"></i> Hủy
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight"
                                aria-labelledby="offcanvasRightLabel">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Tên dự án <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" name="id_chung_cu">
                                            @foreach ($buildings as $building)
                                                <option value="{{ $building->id }}"
                                                    {{ $room->id_chung_cu == $building->id ? 'selected' : '' }}>
                                                    {{ $building->ten_chung_cu }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Thêm ảnh <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="images[]"
                                                onchange="previewImages(event)" multiple>
                                            <!-- Đây là container chỉ dành cho ảnh mới được preview -->
                                            <div id="imagePreviews" class="row mt-2"></div>
                                        </div>

                                        <!-- Container cho ảnh cũ được hiển thị từ server -->
                                        @if ($room->images)
                                        <p class="fs-2 text-center mb-0">
                                            Ảnh cũ
                                        </p> 
                                            @php
                                                $imagePaths = json_decode($room->images);
                                            @endphp
                                            <div class="row">
                                                @foreach ($imagePaths as $imagePath)
                                                    <div class="col-4">
                                                        <img src="{{ asset($imagePath) }}" alt="Old Image"
                                                            class="img-fluid mb-2" style="max-width: 100%;">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>Chưa có ảnh</p>
                                        @endif
                                        <p class="fs-2 text-center mb-0">
                                            Đặt hình ảnh thu nhỏ của sản phẩm. Chỉ chấp nhận các tệp hình ảnh *.png, *.jpg và *.jpeg.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Nội thất <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" name="noi_that">
                                            <option value="0" {{ $room->noi_that == 0 ? 'selected' : '' }}>Đầy đủ
                                            </option>
                                            <option value="1" {{ $room->noi_that == 1 ? 'selected' : '' }}>Ấm cúng
                                            </option>
                                        </select>
                                    </div>
                                </div>
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
