@extends('adminlte::page')

@section('title', 'Tin tức')

@section('content_header')

    <div class="row">
        <div class="col-6">
            <h1>Tin tức</h1>
        </div>
        <div class="col-6">

            <a href="/news/add" class="btn btn-success float-right">Thêm mới
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
                                    <th>Tên tin tức</th>
                                    <th>Hình ảnh</th>
                                    <th>slug</th>
                                    <th>Lượt xem</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                    <tr>
                                        <td>{{ $new->id }}</td>
                                        <td>{{ $new->tieude }}</td>
                                        <td><img src="{{asset( $new->hinhanh) }}" alt=""  style="width: 100px; height: auto;"></td>
                                        <td>{{ $new->slug }}</td>

                                        <td>
                                            <p>Lượt xem: {{ $new->luotxem }}</p>
                                        </td>
                                        <td>   <a class="btn btn-primary btn-sm" href="news/{{ $new->id }}"><i
                                            class="fas fa-folder"></i> View</a>
                                            <a class="btn btn-info btn-sm" href="news/edit/{{ $new->id }}"><i
                                                    class="fas fa-pencil-alt"></i> Edit</a>
                                            <form action="{{ route('news.destroy', $new->id) }}" method="POST" style="display:inline;">
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

        });
    </script>
@stop

@section('plugins.Datatables', true)
