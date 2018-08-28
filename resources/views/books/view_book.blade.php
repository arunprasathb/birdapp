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

              <hr>

              <strong><i class="fa fa-sticky-note margin-r-5"></i> Short Description</strong>

              <p class="text-muted">{{$book_details->shortDescription}}</p>

              <hr>

              <strong><i class="fa fa-file-pdf-o margin-r-5"></i> Long Description</strong>

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

              @if ($book_details->map != '')
                  <hr>

                  <strong><i class="fa fa-file-image-o margin-r-5"></i> Map</strong> <br>
                  <img src="{{$book_details->map}}" alt="Map" class="admin-book-img">
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <br>
              <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Book Species List</h3>
                    <a href="/admin/books/{{$book_details['id']}}/add-species" class="btn btn-block btn-primary btn-sm max-w-100px pull-right"><i class='fa fa-plus'></i> Add Species</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="species-list" class="table table-striped table-bordered dt-responsive nowrap">
                      <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Species Name</th>
                        <th>Species Image</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($book_species as $index => $species)
                          <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$species['speciesName']}}</td>
                            <td>
                                @if ($book_details->imageUrl != '')
                                    <img src="{{$species->imageUrl}}" alt="{{$species->speciesName}}" class="admin-species-list-img">
                                @endif
                            <td>
                              <a href="/admin/species/{{$species['id']}}/view"><i class='fa fa-eye button-link'></i></a> 
                              <a href="/admin/species/{{$species['id']}}/edit"><i class='fa fa-pencil button-link'></i></a>
                              {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/species', $species['id']],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger button-link delete-link',
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