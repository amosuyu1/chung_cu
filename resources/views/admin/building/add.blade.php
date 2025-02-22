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
                                    <input type="text" class="form-control" placeholder="Nhập thông tin" name="ten_can_ho">
                                </div>
                                <div>
                                    <label class="form-label">Mô tả</label>
                                        <!-- Summernote editor -->
                                        <textarea id="summernote"  name="mo_ta"></textarea>

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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Mục đích<span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control custom-select" name="muc_dich">

                                                <option value="0">Bán</option>
                                                <option value="1">Thuê</option>
                                                <option value="2">Bán hoặc thuê</option>
                                                <option value="3">Ngắn hạn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Diện tích m²<span class="text-danger">*</span>
                                            </label>
                                            <input value="00.00" type="number" class="form-control" value="" name="dien_tich">
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
                                            <label class="form-label">Mục đích <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control custom-select" name="muc_dich">

                                                <option value="0">Bán</option>
                                                <option value="1">Thuê</option>
                                                <option value="2">Bán hoặc thuê</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Giá bán <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" placeholder="10 Tỷ" name="gia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Giá thuê<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control"  placeholder="10tr/tháng" name="gia_thue">
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


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <label class="form-label">Thêm ảnh <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        {{-- <input type="file" class="form-control" name="images[]" multiple> --}}
                                        <input type="file" class="form-control"  id="imageInput" name="images[]"  onchange="previewImages(event)" multiple>
                                        <div id="imagePreviews" class="row"></div>
                                      </div>
                                    <p class="fs-2 text-center mb-0">
                                        Đặt hình ảnh thu nhỏ của sản phẩm. Chỉ chấp nhận các tệp hình ảnh *.png, *.jpg và *.jpeg.
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-7">
                                        <label class="form-label">Nội thất <span class="text-danger">*</span>
                                        </label>
                                        <div class="p-2 h-100 bg-success rounded-circle"></div>
                                    </div>
                                    <div>

                                        <select class="form-control custom-select" name="noi_that">
                                                <option value="0">Đầy đủ</option>
                                                <option value="1">Ấm cúng</option>
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
                // Summernote
                $('#summernote').summernote();

                // Preview images
                function previewImages(event) {
                    const files = event.target.files;
                    const previewsContainer = document.getElementById('imagePreviews');
                    previewsContainer.innerHTML = ''; // Clear previous previews

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const reader = new FileReader();

                        reader.onload = function() {
                            // Tạo một thẻ div bao quanh ảnh
                            const imageWrapper = document.createElement('div');
                            imageWrapper.classList.add('col-md-4',
                            'mb-2'); // Sử dụng col-md-4 cho ảnh trong grid layout

                            const img = document.createElement('img');
                            img.src = reader.result;
                            img.classList.add('img-thumbnail'); // Sử dụng Bootstrap 4 class để tạo ảnh có viền
                            img.style.width = '100%'; // Đảm bảo ảnh có chiều rộng đầy đủ trong container
                            img.style.height = 'auto'; // Tự động điều chỉnh chiều cao

                            // Thêm ảnh vào div và div vào container
                            imageWrapper.appendChild(img);
                            previewsContainer.appendChild(imageWrapper);
                        };

                        if (file) {
                            reader.readAsDataURL(file); // Đọc từng file dưới dạng data URL
                        }
                    }
                }
            });
</script>
@stop
@section('plugins.Datatables', true)