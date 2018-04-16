@extends('layouts.default')
@section('content')
<div class="row home-content">
	<div class="col-lg-3"></div>
	<div class="col-lg-3 text-center">
		<h1 class="text-white">日志管理系统</h1>
		<p class="text-white info">
			你还在烦恼写日志很麻烦吗？<br/>
			赶紧进来，还在等什么呢~ <br/>
			如果你还没注册，请先注册哦！<br/>
		</p>
	</div>
	<div class="col-lg-3 login">
		<h5>登录</h5>
		<hr>
		<form>
		  <div class="form-group">
		    <label for="email">Email 地址:</label>
		    <input type="email" class="form-control" id="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">密码:</label>
		    <input type="password" class="form-control" id="pwd">
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="checkbox"> 记住我
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">登录</button>
		</form>
		<hr>
		<p>还没账号？<a href="#">现在注册</a></p>
	</div>
	<div class="col-lg-3"></div>
</div>
@stop