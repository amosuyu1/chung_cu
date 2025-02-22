@extends('adminlte::page')

@section('title', 'DataTables Example')

@section('content_header')

    <div class="row">
        <div class="col-6">
            <h1>Căn hộ</h1>
        </div>
        <div class="col-6">


            <button type="button" class="btn btn-primary  float-right" data-toggle="modal" data-target="#addBuildingModal">
                Thêm chung cư
            </button>     
            <div class="modal fade" id="addBuildingModal" tabindex="-1" role="dialog" aria-labelledby="addBuildingModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBuildingModalLabel">Thêm chung cư mới</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{ route('building.store') }}"  id="addBuildingForm">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên chung cư</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="floors">Số tầng</label>
                                    <input type="number" class="form-control" id="floors" name="floors" required>
                                </div>
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>       
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
                                    <th>Tên Chung Cư</th>
                                    <th>Địa chỉ</th>
                                    <th>Số tầng</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildings as $building)
                                    <tr>
                                        <td>{{ $building->id }}</td>
                                        <td>{{ $building->ten_chung_cu }}</td>
                                        <td>{{ $building->dia_chi }}</td>

                                        <td>
                                            <p>Số tầng: {{ $building->so_tang }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="building/edit/{{ $building->id }}"><i
                                                    class="fas fa-pencil-alt"></i> Edit</a>
                                            <form action="{{ route('building.destroy', $building->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn để xóa mục này?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
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
