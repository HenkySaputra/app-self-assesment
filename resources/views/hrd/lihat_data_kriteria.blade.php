@extends('hrd/layout/master')

@section('content')

    <section class="content-header">
      <h1>
        Manajemen Data Kriteria
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

          <div class="box">
            <div class="box-header">
              <br><br>
              <a href="/hrd/tambah_kriteria" class="btn btn-success"><i class="fa fa-user-plus">Tambah Data</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kriteria</th>
                  <th>Description</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($criteria as $criterion)
                <tr>
                    <td>{{ $criterion['name'] }}</td>
                    <td>{{ $criterion['description']  }}</td>
                    <td>
                        <a href="/super/edit-kriteria" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/super/hapus-kriteria" onClick="return confirm('Anda Yakin Hapus Data: ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
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
    <!-- /.content -->
@stop
