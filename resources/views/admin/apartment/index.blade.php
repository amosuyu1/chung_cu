@extends('adminlte::page')

@section('title', 'DataTables Example')

@section('content_header')

    <div class="row">
        <div class="col-6">
            <h1>Căn hộ</h1>
        </div>
        <div class="col-6">

            <a href="/apartment/add" class="btn btn-success float-right">Thêm mới
            </a>

        </div>

    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if (session('success'))
                        <div class="card-header">
                            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                            <div class="alert alert-primary alert-dismissible fade show center" role="alert">
                                <strong>Thành công!</strong> Đã xóa hoàn toàn dữ liệu này.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show ">{{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Căn Hộ</th>
                                    <th>Tên Chung Cư</th>
                                    <th>Giá Thuê / Giá</th>
                                    <th>Chi Tiết</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ Str::limit(strip_tags($row->ten_can_ho), 50, '...') }}</td>
                                        <td>{{ $row->building->ten_chung_cu }}</td>
                                        <td> {{ $row->gia }}</br>{{ $row->gia_thue }} </td>
                                        <td>
                                            <p>Diện tích: {{ $row->dien_tich }}</p>
                                            <p>Phòng ngủ: {{ $row->so_phong }}</p>
                                            <p>Phòng tắm: {{ $row->phong_tam }}</p>
                                            <p>Hướng: {{ $row->Huong_nha }}</p>
                                        </td>
                                        <td>
                                            
                                            <span
                                                class="badge change-status {{ $row->trang_thai == 0 ? 'bg-info' : 'bg-danger' }}"
                                                data-id="{{ $row->id }}" data-status="{{ $row->trang_thai }}" style="cursor: pointer;">
                                                {{ $row->trang_thai == 0 ? 'Đang đăng' : 'Đã gỡ' }}
                                            </span>
                                            <div>
                                                <div class="badge {{ $row->muc_dich == 0 ? 'bg-success' : ($row->muc_dich == 1 ? 'bg-warning' : 'bg-primary') }}"
                                                    data-status="{{ $row->muc_dich }}">
                                                    {{ $row->muc_dich == 0 ? 'Bán' : ($row->muc_dich == 1 ? 'Thuê' : 'Bán hoặc thuê') }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="apartment/{{ $row->id }}"><i
                                                    class="fas fa-folder"></i> View</a>
                                            <a class="btn btn-info btn-sm" href="apartment/edit/{{ $row->id }}"><i
                                                    class="fas fa-pencil-alt"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="apartment/destroy/{{ $row->id }}"
                                                onclick="return confirm('Bạn có chắc chắn để xóa mục này?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "ordering": true, // Bật sắp xếp
                "order": [
                    [0, 'asc']
                ], // Sắp xếp mặc định theo cột ID
                "pageLength": 10, // Số dòng trên mỗi trang
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ mục mỗi trang",
                    "zeroRecords": "Không tìm thấy dữ liệu",
                    "info": "Hiển thị trang _PAGE_ của _PAGES_",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(lọc từ _MAX_ mục)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "previous": "Trước",
                        "next": "Tiếp"
                    }
                }
            });

            $('.change-status').click(function() {
                // Kiểm tra confirm
                if (!confirm('Bạn có chắc chắn để thay đổi trạng thái này?')) {
                    return false; // Ngừng thực hiện nếu bấm "Hủy"
                }
                const badge = $(this),
                    id = badge.data('id'),
                    current = badge.data('status'),
                    newStatus = current === 0 ? 1 : 0,
                    statusText = newStatus === 0 ? 'Đang đăng' : 'Đã gỡ',
                    csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/apartment/update-status/' + id,
                    type: 'POST',
                    data: {
                        status: newStatus,
                        _token: csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            badge.data('status', newStatus)
                                .removeClass('bg-info bg-danger')
                                .addClass(newStatus === 0 ? 'bg-info' : 'bg-danger')
                                .text(statusText);
                        } else {
                            alert('Có lỗi xảy ra khi cập nhật trạng thái.');
                        }
                    },
                    error: function() {
                        alert('Lỗi! Không thể cập nhật trạng thái.');
                    }
                });
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)
