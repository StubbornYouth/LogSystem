@extends('layouts.default')
@section('title','用户注册')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 register">
			<h5>注册</h5>
			<hr/>
			@include('layouts._error')
			<form action="{{ route('users.store') }}" method="post">
			  {{ csrf_field() }}
			  <div class="form-group">
			    <label for="name">名称:</label>
			    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
			  </div>
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
			  <button type="submit" class="btn btn-primary">注册</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
@stop