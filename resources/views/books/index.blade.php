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
      @include('flash::message')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Books List</h3>
              <a href="/admin/books/add" class="btn btn-block btn-primary btn-sm max-w-100px pull-right"><i class='fa fa-plus'></i> Add Book</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="books-list" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                  <!-- <th>S.No</th> -->
                  <th>Book Name</th>
                  <th>Book Cost</th>
                  <th>Author</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($books as $index => $book)
                    <tr>
                      <!-- <td>{{$index+1}}</td> -->
                      <td>{{$book->bookName}}</td>
                      <td>{{$book->price}}</td>
                      <td>{{$book->author}}</td>
                      <td>{{$book->status}}</td>
                      <td>
                        <a href="/admin/books/{{$book->id}}/view" title="View"><i class='fa fa-eye button-link'></i></a> 
                        <a href="/admin/books/{{$book->id}}/edit" title="Edit"><i class='fa fa-pencil button-link'></i></a>
                         {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/books', $book['id']],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o button-link" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger delete-link',
                                            'title' => 'Delete Post',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
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