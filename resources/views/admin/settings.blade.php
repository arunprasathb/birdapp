@section('content')
@extends('layout')
@include('header')
@include('sidebar')



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        App Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
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
              <small><b>Disclaimer: It is advisable to change background color only, since we have multiple screen resolution devices, images may not fit in allover the screen in some devices. Upload image at your own risk. Some colors may affect the content of the text in the application, so change the color at your own risk.</b></small>
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
              <form role="form" method="post" class="settings"  action="{{action('AdminController@settingsUpdate')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">

                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="imageUrl">Booklist Background settings</label></div>
                      <div class="panel-body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <label for="bookName">Booklist Bg Option: </label>
                            <input type="radio" name="booklist_bg_option" value="color" onclick="ShowHideDiv()" class="color_option" {{ ($app_settings->booklist_bg_option == "color")? "checked" : "" }} ><label>Color</label>
                            <input type="radio" name="booklist_bg_option" value="image" onclick="ShowHideDiv()" class="image_option" {{ ($app_settings->booklist_bg_option == "image")? "checked" : "" }}><label>Images</label>
                          </div>
                        </div>
                        <div class="col-md-12 image_field">
                          <div class="form-group col-md-6">
                            <label for="author">Booklist Bg Image: </label><br>
                             @if ($app_settings->booklist_bg_image != '')
                                <img src="{{$app_settings->booklist_bg_image}}" alt="Booklist Background Image" class="admin-book-img">
                            @endif
                            <input type="file" name="booklist_bg_image" class="form-control" placeholder="Enter Color code" value="{{ old('booklist_bg_image', $app_settings->booklist_bg_image) }}">
                            <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                            
                          </div>
                        </div>
                        <div class="col-md-12 color_field">
                          <div class="form-group col-md-6">
                            <label for="price">Booklist Bg color: </label>
                            <input type="text" class="form-control colorpicker" name="booklist_bg_color" placeholder="Color code" value="{{ old('booklist_bg_color', $app_settings->booklist_bg_color) }}">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="imageUrl">Species list Background settings</label></div>
                      <div class="panel-body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="bookName">Species list Bg Option: </label>
                            <input type="radio" name="specieslist_bg_option" value="color" onclick="ShowHideDiv1()" class="color_option1" {{ ($app_settings->specieslist_bg_option == "color")? "checked" : "" }} ><label>Color</label>
                            <input type="radio" name="specieslist_bg_option" value="image" onclick="ShowHideDiv1()" class="image_option1 onclick="ShowHideDiv()" class="image_option2"" {{ ($app_settings->specieslist_bg_option == "image")? "checked" : "" }} ><label>Images</label>
                          </div>
                        </div>
                        <div class="col-md-12 image_field1">
                          <div class="form-group col-md-6">
                            <label for="author">Species list Bg Image: </label><br>
                            @if ($app_settings->specieslist_bg_image != '')
                                <img src="{{$app_settings->specieslist_bg_image}}" alt="Specieslist Background Image" class="admin-book-img">
                            @endif
                            <input type="file" name="specieslist_bg_image" class="form-control" placeholder="Enter Color code" value="{{ old('specieslist_bg_image', $app_settings->specieslist_bg_image) }}">
                            <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                          </div>
                        </div>

                        <div class="col-md-12 color_field1">
                          <div class="form-group col-md-6">
                            <label for="price">Species list Bg color: </label>
                            
                            <input type="text" class="form-control colorpicker" name="specieslist_bg_color" placeholder="Color code" value="{{ old('specieslist_bg_color', $app_settings->specieslist_bg_color) }}">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="imageUrl">Voicelist Background settings</label></div>
                      <div class="panel-body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="bookName">Voicelist Bg Option: </label>
                            <input type="radio" name="voicelist_bg_option" value="color" onclick="ShowHideDiv2()" class="color_option2" {{ ($app_settings->voicelist_bg_option == "color")? "checked" : "" }} ><label>Color</label>
                            <input type="radio" name="voicelist_bg_option" value="image" onclick="ShowHideDiv2()" class="image_option2" {{ ($app_settings->voicelist_bg_option == "image")? "checked" : "" }} ><label>Images</label>
                          </div>
                        </div>
                        <div class="col-md-12 image_field2">
                          <div class="form-group col-md-6">
                            <label for="author">Voicelist Bg Image: </label><br>
                            @if ($app_settings->voicelist_bg_image != '')
                                <img src="{{$app_settings->voicelist_bg_image}}" alt="Voicelist Background Image" class="admin-book-img">
                            @endif
                            <input type="file" name="voicelist_bg_image" class="form-control" placeholder="Enter Color code" value="{{ old('voicelist_bg_image', $app_settings->voicelist_bg_image) }}">
                            <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                          </div>
                        </div>
                        <div class="col-md-12 color_field2">
                          <div class="form-group col-md-6">
                            <label for="price">Voicelist Bg color: </label>
                            <input type="text" class="form-control colorpicker" name="voicelist_bg_color" placeholder="Color code" value="{{ old('voicelist_bg_color', $app_settings->voicelist_bg_color) }}">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="imageUrl">Species Detail Background settings</label></div>
                      <div class="panel-body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="bookName">Species Detail Bg Option: </label>
                            <input type="radio" name="species_detail_bg_option" value="color" onclick="ShowHideDiv3()" class="color_option3" {{ ($app_settings->species_detail_bg_option == "color")? "checked" : "" }} ><label>Color</label>
                            <input type="radio" name="species_detail_bg_option" value="image" onclick="ShowHideDiv3()" class="image_option3" {{ ($app_settings->species_detail_bg_option == "image")? "checked" : "" }} ><label>Images</label>
                          </div>
                        </div>
                        
                        <div class="col-md-12 image_field3">
                          <div class="form-group col-md-6">
                            <label for="author">Species Detail Bg Image:</label><br>
                            @if ($app_settings->species_detail_bg_image != '')
                                <img src="{{$app_settings->species_detail_bg_image}}" alt="species_detail Background Image" class="admin-book-img">
                            @endif
                            <input type="file" name="species_detail_bg_image" class="form-control" placeholder="Enter Color code" value="{{ old('species_detail_bg_image', $app_settings->species_detail_bg_image) }}">
                            <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                          </div>
                        </div>
                        <div class="col-md-12 color_field3">
                          <div class="form-group col-md-6">
                            <label for="price">Species Detail Bg color:</label>
                            <input type="text" class="form-control colorpicker" name="species_detail_bg_color" placeholder="Color code" value="{{ old('species_detail_bg_color', $app_settings->species_detail_bg_color) }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><label for="imageUrl">Part Screen Background settings</label></div>
                      <div class="panel-body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <label for="bookName">Part Screen Bg Option: </label>
                            <input type="radio" name="part_screen_bg_option" value="color" onclick="ShowHideDiv4()" class="color_option4" {{ ($app_settings->part_screen_bg_option == "color")? "checked" : "" }} ><label> Color</label>
                            <input type="radio" name="part_screen_bg_option" value="image" onclick="ShowHideDiv4()" class="image_option4" {{ ($app_settings->part_screen_bg_option == "image")? "checked" : "" }} ><label> Images</label>
                          </div>
                        </div>
                        <div class="col-md-12 image_field4">
                          <div class="form-group col-md-6">
                            <label for="author">Part Screen Bg Image: </label><br>
                            @if ($app_settings->part_screen_bg_image != '')
                                <img src="{{$app_settings->part_screen_bg_image}}" alt="part_screen Background Image" class="admin-book-img">
                            @endif
                            <input type="file" name="part_screen_bg_image" class="form-control" placeholder="Enter Color code" value="{{ old('part_screen_bg_image', $app_settings->part_screen_bg_image) }}">
                            <small><b>Note:</b><ul><li> Image type should be JPG, JPEG, PNG.</li> <li>Maximum image size is 5MB</li></ul></small>
                          </div>
                        </div>  
                        <div class="col-md-12 color_field4">
                          <div class="form-group col-md-6">
                            <label for="price">Part Screen Bg color:</label>
                            <input type="text" class="form-control colorpicker" name="part_screen_bg_color" placeholder="Color code" value="{{ old('part_screen_bg_color', $app_settings->part_screen_bg_color) }}">
                          </div>
                        </div>
                        
                      </div>
                    </div>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop