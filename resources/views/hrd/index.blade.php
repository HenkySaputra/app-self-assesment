@extends('hrd.layout.master')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ count($listUsers) }}</h3>
              <p>Employee</p>
            </div>
              <a href="{{ route('lihat_jumlah_employee') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ count($listCriteria) }}<sup style="font-size: 20px"></sup></h3>
              <p>Criteria</p>
            </div>
            <a href="{{ route('lihat_jumlah_kriteria') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ count($employeeFinish) }}</h3>
              <p>Selesai Mengisi</p>
            </div>
            <a href="{{ route('lihat_sudah_mengisi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>{{ count($employeeNotFinish) }}</h3>
              <p>Belum Selesai</p>
            </div>
            <a href="{{ route('lihat_masih_mengisi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3>{{ count($employeeNotStarted) }}</h3>
              <p>Belum Mulai</p>
            </div>
            <a href="{{ route('lihat_belum_mengisi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

</div>


@stop
