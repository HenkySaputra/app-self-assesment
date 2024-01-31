@extends('super/layout/master')

@section('content')

    <section class="content-header">
      <h1>
        Manajemen Tambah Data User
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
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('proses_tambah_user') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"  required>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group col-md-4">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="name" required>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="workDate">Work Date</label>
                        <input type="date" class="form-control" id="workDate" name="workDate" required>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                        </div>

                        <div class="form-group col-md-4">
                        <label for="roleId">Role</label>
                        <select id="roleId" name="roleId" class="form-control" >
                            <option value=""></option>
                            <option value="1">Admin</option>
                            <option value="2">Hrd</option>
                            <option value="3">Employee</option>

                        </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button> <button type="reset" class="btn btn-danger">Batal</button>
                    </div>

                </form>
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
