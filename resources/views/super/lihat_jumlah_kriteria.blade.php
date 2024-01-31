@extends('super.layout.master')

@section('content')

     <section class="content-header">
      <h1>
        Lihat Jumlah Kriteria
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
                  <th>Kriteria</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($criteria as $criterion)
                  <tr>
                    <td>{{ $criterion['name'] }}</td>
                    <td>{{ $criterion['description'] }}</td>
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
