@extends('hrd.layout.master')

@section('content')

     <section class="content-header">
      <h1>
        Lihat Sudah Mengisi Assessment
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Position</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($assessments as $assessment)
                  <tr>
                    <td>{{ $assessment['name'] }}</td>
                    <td>{{ $assessment['position'] }}</td>
                  </tr>
                  @endforeach
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
