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

                <form method="POST" action="{{ route('addNewRoom') }}" class="" enctype="multipart/form-data">
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
                                            name="ten_can_ho">
                                    </div>
                                    <div>
                                        <label class="form-label">Mô tả</label>
                                        <!-- Summernote editor -->
                                        <textarea id="summernote" name="mo_ta"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Hướng nhà <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control custom-select" name="Huong_nha">

                                                    <option value="Đông">Đông</option>
                                                    <option value="Tây">Tây</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Bắc">Bắc</option>
                                                    <option value="Đông Bắc">Đông Bắc</option>
                                                    <option value="Tây Bắc">Tây Bắc</option>
                                                    <option value="Tây Nam">Tây Nam</option>
                                                    <option value="Đông Nam">Đông Nam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Nội thất <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control custom-select" name="noi_that">
                                                    <option value="0">Đầy đủ</option>
                                                    <option value="1">Cơ bản</option>
                                                    <option value="1">Không nội thất</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Diện tích m²<span class="text-danger">*</span>
                                                </label>
                                                <input value="00.00" type="number" class="form-control" value=""
                                                    name="dien_tich">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phòng tắm<span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control custom-select" name="phong_tam">

                                                    <option value="1">1 phòng tắm</option>
                                                    <option value="2">2 phòng tắm</option>
                                                    <option value="3">3 phòng tắm</option>
                                                    <option value="4">4 phòng tắm</option>
                                                    <option value="5">5 phòng tắm</option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phòng ngủ<span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control custom-select" name="so_phong">

                                                    <option value="1">1 phòng ngủ</option>
                                                    <option value="2">2 phòng ngủ</option>
                                                    <option value="3">3 phòng ngủ</option>
                                                    <option value="4">4 phòng ngủ</option>
                                                    <option value="5">5 phòng ngủ</option>

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
                                                <label class="form-label">Mục đích <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control custom-select" name="muc_dich" id="muc_dich">
                                                    <option value="0">Bán</option>
                                                    <option value="1">Thuê</option>
                                                    <option value="2">Bán hoặc thuê</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Giá bán <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="10 Tỷ"
                                                    name="gia" id="gia">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Giá thuê <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="10tr/tháng"
                                                    name="gia_thue" id="gia_thue">
                                            </div>
                                        </div>
                                        <p class="fs-2">Có thể nhập 1 trong 2 hoặc nhập cả 2, ghi bằng chữ</p>
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
                                        <div class="d-flex align-items-center justify-content-between mb-7">

                                            <label class="form-label">Tên dự án <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div>

                                            <select class="form-control custom-select" name="id_chung_cu">
                                                @foreach ($buildings as $row)
                                                    <option value="{{ $row->id }}"> {{ $row->ten_chung_cu }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Thêm ảnh <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="imageInput" name="images[]"
                                                multiple accept="image/png, image/jpeg, image/jpg">
                                        </div>
                                        <div id="imagePreviews" class="row"></div>
                                        <p class="fs-2 text-center mb-0">
                                            Đặt hình ảnh thu nhỏ của sản phẩm. Chỉ chấp nhận các tệp hình ảnh *.png, *.jpg
                                            và *.jpeg.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-7">

                                            <label class="form-label">Giấy tờ pháp lý <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div>

                                            <select class="form-control custom-select" name="phap_ly">
                                                    <option value="Sổ đỏ/ Sổ hồng"> Sổ đỏ/ Sổ hồng</option>
                                                    <option value="Hợp đồng mua bán"> Hợp đồng mua bán</option>

                                            </select>
                                        </div>
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
        $(function() {
            // Khởi tạo Summernote
            $('#summernote').summernote();

            // Hàm xem trước ảnh
            function previewImages(event) {
                const files = event.target.files;
                const previewsContainer = document.getElementById('imagePreviews');
                previewsContainer.innerHTML = ''; // Xóa ảnh cũ trước khi thêm ảnh mới

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // Kiểm tra định dạng file
                    if (!file.type.match('image.*')) {
                        alert("Chỉ chấp nhận các file hình ảnh (PNG, JPG, JPEG)!");
                        continue;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Tạo thẻ div bọc ảnh
                        const imageWrapper = document.createElement('div');
                        imageWrapper.classList.add('col-md-4', 'mb-2');

                        // Tạo ảnh
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail');
                        img.style.width = '100%';
                        img.style.height = 'auto';

                        // Thêm ảnh vào div và div vào container
                        imageWrapper.appendChild(img);
                        previewsContainer.appendChild(imageWrapper);
                    };

                    reader.readAsDataURL(file); // Đọc file
                }
            }

            // Gán sự kiện cho input file
            document.getElementById("imageInput").addEventListener("change", previewImages);

            // Xử lý sự kiện thay đổi giá trị của mục đích
            $("#muc_dich").on("change", function() {
                var mucDich = $(this).val();
                var giaBan = $("#gia");
                var giaThue = $("#gia_thue");

                if (mucDich == "0") { // Chọn Bán
                    giaBan.prop("disabled", false);
                    giaThue.prop("disabled", true).val("");
                } else if (mucDich == "1") { // Chọn Thuê
                    giaBan.prop("disabled", true).val("");
                    giaThue.prop("disabled", false);
                } else { // Chọn Bán hoặc Thuê
                    giaBan.prop("disabled", false);
                    giaThue.prop("disabled", false);
                }
            });

            // Kích hoạt sự kiện khi trang tải
            $("#muc_dich").trigger("change");
            $("form").on("submit", function(e) {
                var mucDich = $("#muc_dich").val();
                var giaBan = $("#gia");
                var giaThue = $("#gia_thue");

                var isValid = true;
                var errorMessage = "";

                if (mucDich == "0" && !giaBan.val().trim()) {
                    isValid = false;
                    errorMessage = "Vui lòng nhập giá bán.";
                } else if (mucDich == "1" && !giaThue.val().trim()) {
                    isValid = false;
                    errorMessage = "Vui lòng nhập giá thuê.";
                } else if (mucDich == "2" && (!giaBan.val().trim() || !giaThue.val().trim())) {
                    // Kiểm tra nếu chọn "Bán hoặc thuê" thì bắt buộc nhập cả 2
                    isValid = false;
                    errorMessage = "Vui lòng nhập cả giá bán và giá thuê.";
                }

                if (!isValid) {
                    alert(errorMessage);
                    e.preventDefault(); // Ngăn chặn form submit nếu có lỗi
                }
            });
        });
    </script>

@stop
@section('plugins.Datatables', true)
