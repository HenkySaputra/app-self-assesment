@extends('employee/layout/master')

@section('content')

@if (Session::has('msg')) 
<div class="alert alert-error alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('msg') }}
</div>
@endif

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('template/dist/img/INTEK.png')}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $profileData['name'] }}<h3>

              <p class="text-muted text-center">{{ count($profileData['roles']) ? ucfirst($profileData['roles'][0]['name']) : '-'}}</p>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

              <!-- /.tab-pane -->
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    <?php date_default_timezone_set('Asia/Makassar'); ?>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="created_at" value="<?php echo date ("Y-m-d H:i:s"); ?>">
                    <input type="hidden" name="updated_at" value="<?php echo date ("Y-m-d H:i:s"); ?>">
                    <input type="hidden" name="" value="">
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $profileData['email'] }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" name="name" placeholder="name" value="{{ $profileData['name'] }}" required>
                    </div>
                 <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                  </div>
                </form>
                <br>
                <form class="form-horizontal" action="{{ route('profile.update.password') }}" method="post" enctype="multipart/form-data">
                    <?php date_default_timezone_set('Asia/Makassar'); ?>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="created_at" value="<?php echo date ("Y-m-d H:i:s"); ?>">
                    <input type="hidden" name="updated_at" value="<?php echo date ("Y-m-d H:i:s"); ?>">
                    <input type="hidden" name="" value="">
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="old_password" placeholder="Password" required>
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="new_password" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->


@stop
