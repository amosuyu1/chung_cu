@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div>
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$countApartments}}</h3>

              <p>Căn hộ đăng</p>
            </div>
            <div class="icon">
              <i class="fas fa-search"></i>
            </div>
            <a href="/apartment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$countNews}}</h3>

              <p>Tin tức</p>
            </div>
            <div class="icon">
              <i class="fas fa-search"></i>

            </div>
            <a href="\news" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$countBuildings}}</h3>

              <p>Số chung cư</p>
            </div>
            <div class="icon">
              <i class="fas fa-search"></i>

            </div>
            <a href="/building" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="fas fa-search"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
</div>
 
@stop

@section('css')

@stop

@section('js')

@stop
@section('plugins.Datatables', true)