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
        <li><a href="javascript:void();"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:void();"><i class="fa fa-book"></i> Species</a></li>
        <li class="active">{{$species_details->speciesName}}</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
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

              <hr>
              <strong><i class="fa fa-sticky-note margin-r-5"></i> Short Description</strong>

              <p class="text-muted">{{$species_details->shortDescription}}</p>

              <hr>

              <strong><i class="fa fa-file-pdf-o margin-r-5"></i> Long Description</strong>

              <p class="text-muted">{{$species_details->description}}</p>

              <hr>

              @if ($species_details->imageUrl != '')
                  <hr>

                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Species Image</strong> <br>
                  <img src="{{$species_details->imageUrl}}" alt="{{$species_details->bookName}}" class="admin-book-img">
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <br>
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Species Voices List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Voices</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($voices_list as $voice)
                      <tr>
                        <td>1</td>
                        <td>
                            @if ($voice['mediaUrl'] != '')
                                <audio controls>
                                    <source src="{{$voice['mediaUrl']}}" type="audio/ogg">
                                  </audio>
                            @endif
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
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Gallery Image</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($galleries_list as $gallery)
                      <tr>
                        <td>1</td>
                        <td>
                            @if ($gallery['imageUrl'] != '')
                                <img src="{{$gallery['imageUrl']}}" class="admin-species-list-img">
                            @endif
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