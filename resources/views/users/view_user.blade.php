@section('content')
@extends('layout')
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$user_details->name}}'s Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Name</strong>

              <p class="text-muted">
                {{$user_details->name}}
              </p>

              <hr>

              <strong><i class="fa fa-mobile margin-r-5"></i> Mobile</strong>

              <p class="text-muted">{{$user_details->mobile}}</p>

              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

              <p class="text-muted">{{$user_details->email}}</p>


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
  </div>
  <!-- /.content-wrapper -->

@stop