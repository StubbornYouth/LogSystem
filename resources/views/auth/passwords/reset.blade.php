@extends('layouts.default')
@section('title','更新密码')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 register">
			<h5>更新密码</h5>
			<hr/>
			@include('layouts._error')
			 @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
             @endif
			<form action="{{ route('password.update') }}" method="post">
			  {{ csrf_field() }}
			  <input type="hidden" name="token" value="{{ $token }}" />
			  <div class="form-group">
			    <label for="email">Email 地址:</label>
			    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
			  </div>
			  <div class="form-group">
			    <label for="password">密码:</label>
			    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
			  </div>
			   <div class="form-group">
               	<label for="password_confirmation">确认密码：</label>
            	<input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          	  </div>
			  <button type="submit" class="btn btn-primary">修改密码</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
@stop