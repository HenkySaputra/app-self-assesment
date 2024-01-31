@extends('super/layout/master')

@section('content')

    <section class="content-header">
      <h1>
        Manajemen Edit Data Kriteria
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
                <form action="{{ route('kriteria.update.simpan', ['criteriaId' => $criteria['criteriaId']]) }}" method="POST">
                   @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="Kriteria">Kriteria</label>
                        <input type="text" class="form-control" id="criteria" name="name" value="{{ $criteria['name'] }}" >
                        </div>

                        <div class="form-group col-md-6">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" rows="10" id="description" name="description"  >{{ $criteria['description'] }}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="">Position</label>
                        <input type="text" class="form-control" rows="10" id="Position" name="position" value="{{ $criteria['position'] }}" >
                        </div>
                    </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
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
