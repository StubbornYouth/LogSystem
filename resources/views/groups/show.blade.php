@extends('layouts.default')
@section('title','组详情')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-tabs nav-justified text-nowrap group-tab">
			    <li class="nav-item">
			      <a class="nav-link active" href="{{ route('groups.show',$group->id) }}">组</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('logs.create',$group->id) }}">写日志</a>
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
			<div class="group-tab-page text-center border-bottom">
    			<img class="img-responsive rounded-circle" src="{{ $group->group_head }}" alt="组头像" style="width:100px;" />
	    		<div class="card-body">
	      			<h4 class="card-title">{{ $group->name }}</h4>
	      			<p class="card-text"></p>
	      			@cannot('update',$group)
	      			<a href="#" class="btn btn-light border">离开组</a>
	      			@endcannot
	   			</div>
  			</div>
		</div>
	</div>
@stop