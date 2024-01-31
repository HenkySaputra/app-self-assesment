@extends('employee.layout.master')

@section('content')

<section class="content-header">
      <h1>
        Penilaian
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <section class="content">
      <form action="{{ route('simpanPenilaian', ['userId' => request('userId')]) }}" method="POST">
        @csrf
        @foreach ($criteria as $criterion)
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                  <p>{{ $criterion['name'] }}</p>
                  <p>{{ $criterion['description'] }}</p>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-striped">
                  <label class="radio-inline">
                      <input type="radio" name="{{ $criterion['criteriaId'] }}" value=1 required>1
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="{{ $criterion['criteriaId'] }}" value=2>2
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="{{ $criterion['criteriaId'] }}" value=3>3
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="{{ $criterion['criteriaId'] }}" value=4>4
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="{{ $criterion['criteriaId'] }}" value=5>5
                  </label>
                </table>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endforeach
            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
      </form>
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>

<section class="content">


</section>


@stop
