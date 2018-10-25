@section('content')
@extends('table-layout')
@include('header')
@include('sidebar')



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Books
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/books"><i class="fa fa-book"></i> Books</a></li>
        <li class="active">{{$book_details->bookName}}</li>
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
              <h3 class="box-title">{{$book_details->bookName}} - Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Book Name</strong>

              <p class="text-muted">
                {{$book_details->bookName}}
              </p>

              <!-- <hr>

              <strong><i class="fa fa-sticky-note margin-r-5"></i> Short Description</strong>

              <p class="text-muted">{{$book_details->shortDescription}}</p> -->

              <hr>

              <strong><i class="fa fa-file-pdf-o margin-r-5"></i>Description</strong>

              <p class="text-muted">{{$book_details->description}}</p>

              <hr>

              <strong><i class="fa fa-user-secret margin-r-5"></i> Author</strong>

              <p class="text-muted">{{$book_details->author}}</p>

              <hr>

              <strong><i class="fa fa-money margin-r-5"></i> Cost</strong>

              <p class="text-muted">{{$book_details->price}}</p>

              @if ($book_details->imageUrl != '')
                  <hr>

                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Book Image</strong> <br>
                  <img src="{{$book_details->imageUrl}}" alt="{{$book_details->bookName}}" class="admin-book-img">
              @endif

              
              <hr>
              <div class="row">
               <!--  @if ($book_details->paidPdfUrl != '')
                    <div class="col-md-6">
                      <strong><i class="fa fa-file-image-o margin-r-5"></i> Part-1 PDF</strong> <br>
                      <embed src="{{$book_details->paidPdfUrl}}" style="min-height: 370px;width: 90%;" />
                    </div>
                @endif -->
                @if ($book_details->unpaidPdfUrl != '')
                  <div class="col-md-6">
                    <strong><i class="fa fa-file-image-o margin-r-5"></i> Unpaid PDF</strong> <br>
                    <embed src="{{$book_details->unpaidPdfUrl}}"  style="min-height: 370px;width: 90%;" />
                  </div>
              @endif

              </div>
                  
              <br><br>
    
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