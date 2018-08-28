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
        <li><a href="/admin/books">Books</a></li>
        <li class="active">Add Book</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Book</h3>
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
            <!-- form start -->
              <form role="form" method="post" action="{{url('/admin/books/create')}}" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="bookName">Book Name</label>
                    <input type="text" name="bookName" class="form-control" id="bookName" placeholder="Enter Book Name" required="required">
                  </div>

                  <div class="form-group">
                    <label for="price">Cost</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Cost" required="required">
                  </div>

                  <div class="form-group">
                    <label for="author">Author Name</label>
                    <input type="text" name="author" class="form-control" id="author" placeholder="Enter Author Name" required="required">
                  </div>

                  <div class="form-group">
                    <label for="imageUrl">Book Image</label>
                    <input type="file" id="imageUrl" name="imageUrl" required="required">
                  </div>
                  
                  <div class="form-group">
                    <label for="map">Map</label>
                    <input type="file" id="map" name="map" required="required">
                  </div>

                  <div class="form-group">
                    <label for="paidPdfUrl">Paid book PDF file</label>
                    <input type="file" id="paidPdfUrl" name="paidPdfUrl" required="required">
                  </div>

                  <div class="form-group">
                    <label for="unpaidPdfUrl">Unpaid book PDF file</label>
                    <input type="file" id="unpaidPdfUrl" name="unpaidPdfUrl" required="required">
                  </div>
                  
                  <div class="form-group">
                    <label for="shortDescription">Book Short Description</label>
                    <textarea class="form-control" rows="3" id="shortDescription" name="shortDescription" placeholder="Enter Book Short Description ..." required="required"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="description">Book Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Book Description..." required="required"></textarea>
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