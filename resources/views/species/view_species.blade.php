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
              <div class="row">
                
              @if ($species_details->imageUrl != '')
                <div class="col-md-6">
                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Species Image</strong> <br>
                  <img src="{{$species_details->imageUrl}}" alt="{{$species_details->bookName}}" class="admin-book-img">
                </div>
              @endif

              @if ($species_details->map != '')
                <div class="col-md-6">
                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Map</strong> <br>
                  <img src="{{$species_details->map}}" alt="Map" class="admin-book-img">
                </div>
              @endif
              </div>
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