@extends('employee.layout.master')

@section('content')

     <section class="content-header">
      <h1>
        Lihat Data History
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

              <table id="example1" class="table table-bordered table-striped">
                <label>Show Priode
                    <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Periode</th>
                  <th>Nilai</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($assessmentsMerged as $assessment)
                @foreach ($assessment['sendedAssessments'] as $sendedAssessment => $value)
                <tr>
                  <td>{{ $value['name'] }}</td>
                  <td>{{ $assessment['period'] }}</td>
                  <td>
                    @foreach ($value['assessments'] as $assessmentCriterion)
                    <span> {{ $assessmentCriterion['criteriaName'] }} : {{ $assessmentCriterion['point'] }} <br></span>
                    @endforeach
                  </td>
                </tr>
                @endforeach
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
