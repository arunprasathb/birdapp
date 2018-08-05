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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Books</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
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
              <form role="form" method="post" action="{{action('BookController@update', $id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <input name="_method" type="hidden" value="PATCH"> -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="bookName">Book Name</label>
                    <input type="text" name="bookName" class="form-control" id="bookName" placeholder="Enter Book Name" required="required" value={{$book->bookName}}>
                  </div>

                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Price" required="required" value={{$book->price}}>
                  </div>

                  <div class="form-group">
                    <label for="author">Author Name</label>
                    <input type="text" name="author" class="form-control" id="author" placeholder="Enter Author Name" required="required" value={{$book->author}}>
                  </div>

                  <div class="form-group">
                    <label for="imageUrl">Book Image</label>
                    @if ($book->imageUrl != '')
                        <img src="{{$book->imageUrl}}" alt="{{$book->bookName}}" class="admin-book-img">
                    @endif
                    <input type="file" id="imageUrl" name="imageUrl_new">
                  </div>
                  
                  <div class="form-group">
                    <label for="map">Map</label>
                    @if ($book->map != '')
                        <img src="{{$book->map}}" alt="{{$book->bookName}} map" class="admin-book-img">
                    @endif
                    <input type="file" id="map" name="map_new">
                  </div>

                  <div class="form-group">
                    <label for="paidPdfUrl">Paid book PDF file</label>
                    @if ($book->paidPdfUrl != '')
                        <embed src="{{$book->paidPdfUrl}}" width="150px" height="100px" />
                    @endif
                    <input type="file" id="paidPdfUrl" name="paidPdfUrl_new">
                  </div>

                  <div class="form-group">
                    <label for="unpaidPdfUrl">Unpaid book PDF file</label>
                     @if ($book->unpaidPdfUrl != '')
                        <embed src="{{$book->unpaidPdfUrl}}" width="150px" height="100px" />
                    @endif
                    <input type="file" id="unpaidPdfUrl" name="unpaidPdfUrl_new">
                  </div>
                  
                  <div class="form-group">
                    <label for="shortDescription">Book Short Description</label>
                    <textarea class="form-control" rows="3" id="shortDescription" name="shortDescription" placeholder="Enter Book Short Description ..." required="required">{{$book->shortDescription}}</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="description">Book Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Book Description..." required="required">{{$book->description}}</textarea>
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