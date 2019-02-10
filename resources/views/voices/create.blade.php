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
        <li class="active">Voices</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('flash::message')
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Voices</h3>
            </div>
            <div class="box-body">
             <!--  @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif -->
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div><br />
              @endif
              <form method="post" action="{{action('VoiceController@store', $id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="bookName">Audio File</label>
                <div class="input-group control-group increment" >
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" placeholder="Audio Name" name="audio-name[]" class="form-control" value="{{ old('audio-name[]') }}">
                    </div>
                    <div class="col-md-4">
                      <input type="file" name="audio[]" class="form-control" value="{{ old('audio[]') }}">
                    </div>
                  </div>
                  <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  </div>
                </div>
                <div class="clone hide">
                  <div class="control-group input-group" style="margin-top:10px">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" placeholder="Audio Name" name="audio-name[]" class="form-control" value="{{ old('audio-name[]') }}">
                      </div>
                      <div class="col-md-4">
                        <input type="file" name="audio[]" class="form-control" value="{{ old('audio[]') }}">
                      </div>
                    </div>
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
              </form> 
              <br>
              <small><b>Note:</b><ul><li>Maximum audio size is 5MB</li></ul></small>     
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