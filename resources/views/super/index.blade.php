@extends('super/layout/master')

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
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ count($listCriteria) }}<sup style="font-size: 20px"></sup></h3>
              <p>Criteria</p>
            </div>
             <a href="{{ route('lihat_jumlah_kriteria') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
            <div class="inner">
              <h3>{{ count($listAllusers) }}<sup style="font-size: 20px"></sup></h3>
              <p>Users</p>
            </div>
            <a href="{{ route('lihat_jumlah_users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>
</div>

    <!-- /.content -->
@stop
