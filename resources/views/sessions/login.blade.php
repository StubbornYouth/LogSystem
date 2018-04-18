@extends('layouts.default')
@section('content')
<div class="row home-content">
	<div class="col-xl-3 col-lg-2"></div>
	<div class="col-xl-3 col-lg-4">
		<div class="jumbotron">
		<h1 class="text-success">日志管理系统</h1>
		<p class="info">
			你还在烦恼写日志很麻烦吗？那就赶紧进来，还在等什么呢~
			如果你还没注册，请先注册哦！
		</p>
		</div>
	</div>
	<div class="col-xl-3 col-lg-4 login">
		<h5>登录</h5>
		<hr>
		@include('layouts._error')
		@include('layouts._session')
		<form action="{{ route('login') }}" method="post">
		  {{ csrf_field() }}
		  <div class="form-group">
		    <label for="email">Email 地址:</label>
		    <input type="email" class="form-control" name="email">
		  </div>
		  <div class="form-group clearfix">
		    <label for="password">密码:</label>
		    <a class="float-right" href="{{ route('password.request') }}">忘记密码？</a>
		    <input type="password" class="form-control" name="password">
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="checkbox" name="remember"> 记住我
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">登录</button>
		</form>
		<hr>
		<p>还没账号？<a href="{{ route('users.create') }}">现在注册</a></p>
	</div>
	<div class="col-xl-3 col-lg-2"></div>
</div>
@stop