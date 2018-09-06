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
        <li class="active">Species</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Species</h3>
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
              <form role="form" method="post" action="{{action('SpeciesController@update', $id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <input name="_method" type="hidden" value="PATCH"> -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="speciesName">Species Name</label>
                    <input type="text" name="speciesName" class="form-control" id="speciesName" placeholder="Enter Species Name" required="required" value={{$species->speciesName}}>
                  </div>

                  <div class="form-group">
                    <label for="imageUrl">Species Image</label>
                    @if ($species->imageUrl != '')
                        <img src="{{$species->imageUrl}}" alt="{{$species->speciesName}}" class="admin-book-img">
                    @endif
                    <input type="file" id="imageUrl" name="imageUrl_new">
                  </div>
                  
                  <!-- <div class="form-group">
                    <label for="shortDescription">Species Short Description</label>
                    <textarea class="form-control" rows="3" id="shortDescription" name="shortDescription" placeholder="Enter Species Short Description ..." required="required">{{$species->shortDescription}}</textarea>
                  </div> -->
                  
                  <div class="form-group">
                    <label for="description">Species Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Species Description..." required="required">{{$species->description}}</textarea>
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