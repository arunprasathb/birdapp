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
      @include('flash::message')
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
              <form role="form" method="post" action="{{action('SpeciesController@update', $species_details->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <input name="_method" type="hidden" value="PATCH"> -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="speciesName">Species Name</label>
                    <input type="text" name="speciesName" class="form-control" id="speciesName" placeholder="Enter Species Name" required="required" value="{{ old('speciesName', $species_details->speciesName) }}">
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="imageUrl">Species Image</label><br>
                          @if ($species_details->imageUrl != '')
                              <img src="{{$species_details->imageUrl}}" alt="{{$species_details->speciesName}}" class="admin-book-img">
                          @endif
                          <input type="file" id="imageUrl" name="imageUrl_new" value="{{ old('speciesName') }}">
                          <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                          <label for="map">Map</label><br>
                          @if ($species_details->map != '')
                              <img src="{{$species_details->map}}" alt="{{$species_details->bookName}} map" class="admin-book-img" value="{{ old('speciesName') }}">
                          @endif
                          <input type="file" id="map" name="map_new">
                          <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                        </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="description">Species Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Species Description..." required="required">{{ old('description', $species_details->description) }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Residency Type</label>
                    <select class="form-control" name="residency">
                        <option value="">Select Residency Type</option>
                        @foreach ($residency as $key => $value)
                            <option value="{{ $value }}"{{ ( $species_details->residency == $value ) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="description">Endemism Type</label>
                    <select class="form-control" name="endemism">
                        <option value="">Select Endemism Type</option>
                        @foreach ($endemism as $key => $value)
                            <option value="{{ $value }}"{{ ( $species_details->endemism == $value ) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="description">Risk level Type</label>
                    <select class="form-control" name="risk_level">
                        <option value="">Select Risk level Type</option>
                        @foreach ($risk_level as $key => $value)
                            <option value="{{ $value }}"{{ ( $species_details->risk_level == $value ) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="description">Habitat Type</label>
                    <select class="form-control" name="habitat">
                        <option value="">Select Habitat Type</option>
                        @foreach ($habitat as $key => $value)
                            <option value="{{ $value }}"{{ ( $species_details->habitat == $value ) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
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
      <br>
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Species Voices List</h3>
                <a href="/admin/species/{{$species_details['id']}}/add-voices" class="btn btn-block btn-primary btn-sm max-w-100px pull-right"><i class='fa fa-plus'></i> Add Voices</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="voice-list" class="table table-striped table-bordered dt-responsive nowrap">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Voice Name</th>
                    <th>Voices</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($voices_list as $index => $voice)
                      <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$voice['name']}}</td>
                        <td>
                            @if ($voice['mediaUrl'] != '')
                                <audio controls>
                                    <source src="{{$voice['mediaUrl']}}" type="audio/ogg">
                                  </audio>
                            @endif
                          </td>
                          <td>
                            {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/voices', $voice['id']],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger delete-link',
                                            'title' => 'Delete Post',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
                          </td>
                        
                      </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <br>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Species Gallery List</h3>
                <a href="/admin/species/{{$species_details['id']}}/add-galleries" class="btn btn-block btn-primary btn-sm max-w-100px pull-right"><i class='fa fa-plus'></i> Add Galleries</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="gallery-list" class="table table-striped table-bordered dt-responsive nowrap">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Gallery Image</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($galleries_list as $index => $gallery)
                      <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            @if ($gallery['imageUrl'] != '')
                                <img src="{{$gallery['imageUrl']}}" class="admin-species-list-img">
                            @endif
                          </td>
                          <td>
                            {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/galleries', $gallery['id']],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger delete-link',
                                            'title' => 'Delete Post',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
                          </td>
                      </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
  
  document.addEventListener('play', function(e){
        var audios = document.getElementsByTagName('audio');
        for(var i = 0, len = audios.length; i < len;i++){
            if(audios[i] != e.target){
                this.currentTime = 0;
                audios[i].pause();
            }
        }
    }, true);
        
</script>
@stop