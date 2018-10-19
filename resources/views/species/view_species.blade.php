@section('content')
@extends('layout')
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
        <li><a href="javascript:void();"><i class="fa fa-book"></i> Species</a></li>
        <li class="active">{{$species_details->speciesName}}</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      @include('flash::message')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$species_details->speciesName}} - Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Species Name</strong>

              <p class="text-muted">
                {{$species_details->speciesName}}
              </p>

              <hr>
               <strong><i class="fa fa-book margin-r-5"></i> Book Name</strong>

              <p class="text-muted">
                {{$book_details->bookName}}
              </p>

             <!--  <hr>
              <strong><i class="fa fa-sticky-note margin-r-5"></i> Short Description</strong>

              <p class="text-muted">{{$species_details->shortDescription}}</p>
 -->
              <hr>

              <strong><i class="fa fa-file-pdf-o margin-r-5"></i> Description</strong>

              <p class="text-muted">{{$species_details->description}}</p>

              <hr>

              @if ($species_details->imageUrl != '')
                  <hr>

                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Species Image</strong> <br>
                  <img src="{{$species_details->imageUrl}}" alt="{{$species_details->bookName}}" class="admin-book-img">
              @endif

              @if ($species_details->map != '')
                  <hr>

                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Map</strong> <br>
                  <img src="{{$species_details->map}}" alt="Map" class="admin-book-img">
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop