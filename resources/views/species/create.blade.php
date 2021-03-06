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
              <h3 class="box-title">Add Species</h3>
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
              <form role="form" method="post" action="{{action('SpeciesController@store', $id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <input name="_method" type="hidden" value="PATCH"> -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="speciesName">Species Name</label>
                    <textarea name="speciesName" class="form-control froala-editor" id="speciesName" placeholder="Enter Species Name" required="required" value="{{ old('speciesName') }}">
                      </textarea>
                  </div>

                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="imageUrl">Species Image</label></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <input type="file" id="imageUrl" name="imageUrl" required="required"  value="{{ old('imageUrl') }}">
                        </div>
                        <div class="col-md-6">
                          <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="shortDescription">Species Short Description</label>
                    <textarea class="form-control" rows="3" id="shortDescription" name="shortDescription" placeholder="Enter Species Short Description ..." required="required"></textarea>
                  </div> -->
                 
                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="map">Map</label></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <input type="file" id="map" name="map" required="required" value="{{ old('map') }}">
                        </div>
                        <div class="col-md-6">
                          <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">Species Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Species Description..." required="required">{{ old('description') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="description">Residency</label>
                    <select class="form-control" name="residency" required="required">
                        <option value="">Select Residency</option>
                        @foreach ($residency as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="description">Endemism</label>
                    <select class="form-control" name="endemism" required="required">
                        <option value="">Select Endemism</option>
                        @foreach ($endemism as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="description">Risk level</label>
                    <select class="form-control" name="risk_level" required="required">
                        <option value="">Select Risk level</option>
                        @foreach ($risk_level as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="description">Habitat</label>
                    <select class="form-control" name="habitat" required="required">
                        <option value="">Select Habitat</option>
                        @foreach ($habitat as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                  
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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