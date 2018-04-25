@extends('layouts.default')
@section('title','')
@section('content')
<div class="row">
	<div class="col-sm-12">
	  <ul class="nav nav-tabs group-nav">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#home">写日志</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#menu1">组员</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#menu2">设置</a>
	  </li>
	</ul>
	 
	<div class="tab-content">
	  <div class="tab-pane active container" id="home">
	  	<h3 class="text-center text-dark"><span class="glyphicon glyphicon-edit"></span> 新日志</h3>
	  	<form action="" method="post">
			  {{ csrf_field() }}
			  <div class="form-group">
			    <textarea class="form-control" rows="5" name="commit" placeholder="填写今日工作内容 eg:开发功能 完成度等" >{{ old('commit') }}</textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">注册</button>
		</form>
	  </div>
	  <div class="tab-pane container" id="menu1">...</div>
	  <div class="tab-pane container" id="menu2">...</div>
	</div>
		</div>	
	</div>
@stop