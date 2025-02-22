@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content_header')
    <h1>Dashboard</h1>
    
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

@stop

@section('css')
    <!-- Thêm CSS cho DataTables -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- Thêm JS cho DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


@stop
