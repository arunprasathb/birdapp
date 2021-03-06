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
        <li class="active">Edit Book</li>
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
                    <input type="text" name="bookName" class="form-control" id="bookName" placeholder="Enter Book Name" required="required" value="{{ old('bookName', $book_details->bookName) }}">
                  </div>

                  <div class="form-group">
                    <label for="price">Cost</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Cost" required="required" value="{{ old('price', $book_details->price) }}">
                  </div>

                  <div class="form-group">
                    <label for="author">Author Name</label>
                    <input type="text" name="author" class="form-control" id="author" placeholder="Enter Author Name" required="required" value="{{ old('author', $book_details->author) }}">
                  </div>

                  <div class="form-group">
                    <label for="font_style">Font Style</label>
                    <select class="form-control" name="font_style" required="required">
                        @foreach ($font_style as $key => $value)
                            <option value="{{ $value }}" {{ ( $book_details->font_style == $value ) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="font_color">Font Color</label>
                    <input type="text" class="form-control colorpicker" name="font_color" placeholder="Color code" value="{{ old('font_color', $book_details->font_color) }}">
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                         <div class="form-group">
                            <label for="imageUrl">Book Image</label><br>
                            @if ($book_details->imageUrl != '')
                                <img src="{{$book_details->imageUrl}}" alt="{{$book_details->bookName}}" class="admin-book-img">
                            @endif
                            <input type="file" id="imageUrl" name="imageUrl_new" value="{{ old('imageUrl_new') }}">
                            <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                          <label for="paidPdfUrl">Paid book PDF file</label><br>
                          @if ($book_details->paidPdfUrl != '')
                              <embed src="{{$book_details->paidPdfUrl}}" width="150px" height="200px" />
                          @endif
                          <input type="file" id="paidPdfUrl" name="paidPdfUrl_new">
                          <small><b>Note:</b> Maximum PDF size is 10MB</small>
                        </div>
                    </div> -->
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="unpaidPdfUrl">Part-1 book PDF file</label><br>
                           @if ($book_details->unpaidPdfUrl != '')
                              <embed src="{{$book_details->unpaidPdfUrl}}" width="150px" height="180px" />
                          @endif
                          <input type="file" id="unpaidPdfUrl" name="unpaidPdfUrl_new" value="{{ old('unpaidPdfUrl_new') }}">
                          <small><b>Note:</b><ul><li> Maximum PDF size is 10MB</li></ul></small>
                        </div>
                    </div>
                  </div>
                 

                  

                  
                  
                  <!-- <div class="form-group">
                    <label for="shortDescription">Book Short Description</label>
                    <textarea class="form-control" rows="3" id="shortDescription" name="shortDescription" placeholder="Enter Book Short Description ..." required="required">{{$book_details->shortDescription}}</textarea>
                  </div> -->
                  
                  <div class="form-group">
                    <label for="description">Book Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Book Description..." required="required">{{ old('description', $book_details->description) }}</textarea>
                  </div>
                  
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
          </div>
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
                        <!-- <th>S.No</th> -->
                        <th>Species Name</th>
                        <th>Species Image</th>
                        <th>Residency</th>
                        <th>Endemism</th>
                        <th>Risk level</th>
                        <th>Habitat</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($book_species as $index => $species)
                          <tr>
                            <!-- <td>{{$index+1}}</td> -->
                            <td>{!! html_entity_decode($species['speciesName'], ENT_QUOTES, 'UTF-8') !!}</td>
                            <td>
                                @if ($book_details->imageUrl != '')
                                    <img src="{{$species->imageUrl}}" alt="{{$species->speciesName}}" class="admin-species-list-img">
                                @endif
                            </td>
                            <td>
                              @if ($species->residency != '')
                                  @if(file_exists( public_path().'/images/residency/'.$species->residency.'.png' ))
                                  <img src="/images/residency/{{$species->residency}}.png" alt="{{$species->residency}}" class="admin-book-img max-h-40">
                                  @else
                                    <img src="/images/residency/{{$species->residency}}.jpg" alt="{{$species->residency}}" class="admin-book-img max-h-40">
                                  @endif
                              @endif
                            </td>
                            <td>@if ($species->endemism != '')
                                      @if(file_exists( public_path().'/images/endemism/'.$species->endemism.'.png' ))
                                      <img src="/images/endemism/{{$species->endemism}}.png" alt="{{$species->endemism}}" class="admin-book-img max-h-40">
                                      @else
                                        <img src="/images/endemism/{{$species->endemism}}.jpg" alt="{{$species->endemism}}" class="admin-book-img max-h-40">
                                      @endif
                                @endif
                            </td>
                            <td>
                              @if ($species->risk_level != '')
                                    @if(file_exists( public_path().'/images/risk_level/'.$species->risk_level.'.png' ))
                                    <img src="/images/risk_level/{{$species->risk_level}}.png" alt="{{$species->risk_level}}" class="admin-book-img max-h-40">
                                    @else
                                      <img src="/images/risk_level/{{$species->risk_level}}.jpg" alt="{{$species->risk_level}}" class="admin-book-img max-h-40">
                                    @endif
                              @endif
                            </td>
                            <td>
                              @if ($species->habitat != '')
                                    @if(file_exists( public_path().'/images/habitat/'.$species->habitat.'.png' ))
                                    <img src="/images/habitat/{{$species->habitat}}.png" alt="{{$species->habitat}}" class="admin-book-img max-h-40">
                                    @else
                                      <img src="/images/habitat/{{$species->habitat}}.jpg" alt="{{$species->habitat}}" class="admin-book-img max-h-40">
                                    @endif
                              @endif
                            </td>
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