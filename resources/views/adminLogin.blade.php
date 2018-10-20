@extends('app')
@section('content')


<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-logo"><strong>{{$site_name}}</strong></div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
    @if(!empty($errors->first()))
        <div class="row col-lg-12">
            <div class="alert alert-danger">
                <span>{{ $errors->first() }}</span>
            </div>
        </div>
    @endif
    <form class="form-horizontal" id="login" role="form" method="POST" action="{{ route('admin.auth') }}">
        {!! csrf_field() !!}
        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="email" class="form-control" id="username" name="email" autocomplete="off" placeholder="Email">
                <span class="glyphicon  glyphicon-user form-control-feedback"></span>
            </div>
        </div>
        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary btn-block btn-flat bold-text">Sign In</button>
            </div>
        </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>

@endsection