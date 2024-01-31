@extends('employee.layout.master')

@section('content')

<div class="content">
    <div class="row">
      @foreach ($listUsers as $user)
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          @if (in_array($user['userId'], $finishedReceivers))
            <div class="small-box bg-green">
              <div class="inner">
                @if ( $myId == $user['userId'])
                  <p>{{ $user['name'] }} (me)</p>
                @else
                  <p>{{ $user['name'] }}</p>
                @endif
              </div>
              <a href="{{ route('penilaian.update', ['userId' => $user['userId']]) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          @else
            <div class="small-box bg-red">
            <div class="inner">
                @if ( $myId == $user['userId'])
                  <p>{{ $user['name'] }} (me)</p>
                @else
                  <p>{{ $user['name'] }}</p>
                @endif
              </div>
              <a href="{{ route('penilaian', ['userId' => $user['userId']]) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          @endif
        </div>
        <!-- ./col -->
      @endforeach
    </div>

</div>

@stop
