@extends('super/layout/master')

@section('content')

    <section class="content-header">
      <h1>
        Manajemen Data user
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
              <a href="/super/tambah-user" class="btn btn-success"><i class="fa fa-user-plus">Tambah Data</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Work Date</th>
                  <th>Position</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user )
                <tr>
                  <td>{{ $user['email'] }}</td>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ count($user['roles'])? $user['roles'][0]['name'] : '-' }}</td>
                  <td>{{ $user['workDate'] }}</td>
                  <td>{{ $user['position'] }}</td>
                  <td>
                     <a href="{{ route('user.update',  ['userId' => $user['userId']]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                     <a href="{{ route('simpan.hapus.user', ['userId' => $user['userId']]) }}" onClick="return confirm('Anda Yakin Hapus Data: ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
