@extends('layouts.default')
@section('title','编辑个人资料')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 register">
			<h5>编辑个人资料</h5>
			<hr/>
			@include('layouts._error')
			<form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
			  {{ method_field('PATCH') }}
			  {{ csrf_field() }}
			  <div class="form-group">
			    <label for="name">姓名：</label>
			    <input type="text" class="form-control" name="real_name" value="{{ old('real_name',$user->real_name) }}">
			  </div>
			  <div class="form-group">
			    <label for="name">用户名：</label>
			    <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }} " disabled>
			  </div>
			  <div class="form-group">
			    <label for="email">Email 地址：</label>
			    <input type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" disabled />
			  </div>
			  <div class="form-group">
			    <label for="password">密码：</label>
			    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
			  </div>
			   <div class="form-group">
               	<label for="password_confirmation">确认密码：</label>
            	<input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          	  </div>
          	  <div class="form-group">
               	<label for="">用户头像：</label>
            	<input type="file" name="head" class="form-control">
          	  </div>
          	   @if($user->head)
                 <img class="thumbnail img-responsive" src="{{ $user->head }}" width="100" />
                 <br/>
               @endif
			  <button type="submit" class="btn btn-primary" style="margin-top:10px;">保存</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
@stop