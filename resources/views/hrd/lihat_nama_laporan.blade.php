@extends('hrd.layout.master')

@section('content')

     <section class="content-header">
      <h1>
        Lihat Nama Laporan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="callout callout-warning">
            <a href="{{ route('penilaian.report') }}" class="btn btn-success">Download Xlsv</a>
            <a href="{{ asset('tes.xlsx') }}">tes download</a>
         </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nilai</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($assessments as $assessment)
                  <tr>
                    <td>{{ $assessment['name'] }}</td>
                    <td>
                      @foreach ($assessment['assessments'] as $key => $value)
                      <span>{{ $key }} : {{ $value }} <br></span>
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@stop
