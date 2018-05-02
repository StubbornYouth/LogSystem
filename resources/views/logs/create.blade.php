@extends('layouts.default')
@section('title','写日志')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs nav-justified text-nowrap group-tab">
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.show',$group->id) }}">组</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link active" href="{{ route('logs.create',$group->id) }}">写日志</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.show_users',$group->id) }}">会员</a>
			    </li>
			     @can('update',$group)
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.edit',$group->id) }}">设置</a>
			    </li>
			    @endcan
			</ul>
			<div class="group-tab-page">
				<h3 class="text-center"><span class="glyphicon glyphicon-check"></span>写日志</h3>
				<hr/>
				@include('layouts._error')
				<form action="{{ route('logs.store',$group->id) }}" method="post">
				  {{ csrf_field() }}
				  <div class="form-group">
				    <input type="text" class="form-control" name="title" placeholder="日志标题,可以不填哦!" value="{{ old('title') }}">
				  </div>
				   <div class="form-group">
	               	<textarea class="form-control" rows="8" name="content" placeholder="今天累了吗?快来写一下~ eg(工作内容，进度...)">{{ old('title') }}</textarea>
	          	  </div>
				  <button type="submit" class="btn btn-primary">保存</button>
				</form>
			</div>
		</div>
	</div>
@stop