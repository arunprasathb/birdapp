@section('content')
@extends('table-layout')
@include('header')
@include('sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Species
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Galleries</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Galleries</h3>
            </div>
            <div class="box-body">
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form method="post" action="{{action('GalleryController@store', $id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="input-group control-group increment" >
                  <input type="file" name="image[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  </div>
                </div>
                <div class="clone hide">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="image[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
              </form>        
              <br>
              <small><b>Note:</b><ul><li> Image type should be JPG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
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