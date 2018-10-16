@section('content')
@extends('table-layout')
@include('header')
@include('sidebar')



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/users">Users</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <div class="box-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div><br />
              @endif
            <!-- form start -->
              <form role="form" method="post" action="{{action('UserController@update', $id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <input name="_method" type="hidden" value="PATCH"> -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="user_name">User Name</label>
                    <input type="text" name="name" class="form-control" id="user_name" placeholder="Enter User Name" required="required" value="{{$users->name}}">
                  </div>

                  <div class="form-group">
                    <label for="user_name">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter User Email" disabled="disabled" required="required" value="{{$users->email}}">
                  </div>
                  
                  <div class="form-group">
                    <label for="user_name">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter User Mobile Number" required="required" value="{{$users->mobile}}">
                  </div>

                  <div class="form-group">
                    <label for="user_name">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label for="user_name">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                  </div>

                  
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop