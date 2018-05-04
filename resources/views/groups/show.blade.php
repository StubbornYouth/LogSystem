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
			<div class="group-tab-page">
				<div class=" text-center border-bottom">
    			<img class="img-responsive rounded-circle" src="{{ $group->group_head }}" alt="组头像" style="width:100px;" />
	    		<div class="card-body">
	      			<h4 class="card-title">{{ $group->name }}</h4>
	      			<p class="card-text"></p>
	      			@cannot('update',$group)
	      			<button type="button" class="btn btn-light" data-toggle="modal" data-target="#leaveGroup">
  						离开组
			  		</button>
			  		@endcannot
			  		<div class="modal fade" id="leaveGroup">
		  			  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title">离开组</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <div class="modal-body text-danger text-left">
					        你确定要离开该{{ $group->name }}吗?
					      </div>
					      <div class="modal-footer">
					        <form action="{{ route('leaveGroup',$group->id) }}" method="post">
	      						{{ method_field('DELETE') }}
			  					{{ csrf_field() }}
	      						<input type="submit" class="btn btn-primary border" value="离开组" />
	      					</form>
					      </div>
					    </div>
		  			</div>
					</div>
	   			</div>
	   			</div>
	   			<div style="margin-top:20px;">
	   				@include('layouts._session')
	   				<h5 class="font-weight-bold">你的日志</h5>
	   				<hr/>
	   				<ul class="list-unstyled">
	   					@foreach($logs as $k=>$log)
	   						<li class="border-bottom clearfix" style="margin-bottom:10px;padding:0px 10px;">
	   							<a href="" data-toggle="modal" data-target="#show{{$k}}">{{ $log->title }}</a>
	   							<div class="modal fade" id="show{{$k}}">
								  <div class="modal-dialog modal-lg">
								    <div class="modal-content">
								 
								      <!-- 模态框头部 -->
								      <div class="modal-header">
								        <h4 class="modal-title">{{ $log->title }}</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>
								 
								      <!-- 模态框主体 -->
								      <div class="modal-body table-responsive">
								        {!! $log->content !!}
								      </div>
								 
								      <!-- 模态框底部 -->
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
								      </div>
								 
								    </div>
								  </div>
								</div>
	   							<sapn class="float-right">
	   								<a href="{{ route('logs.edit',[$group->id,$log->id])}}" class="btn btn-light border" role="button">
	   									<span class="glyphicon glyphicon-edit"></span> 编辑
	   								</a>
	   								<a href="" class="btn btn-light border" role="button" data-toggle="modal" data-target="#del{{$k}}">
	   									<span class="glyphicon glyphicon-trash"></span> 删除
	   								</a>
	   								<div class="modal fade" id="del{{$k}}">
									  <div class="modal-dialog">
									    <div class="modal-content">
									 
									      <!-- 模态框头部 -->
									      <div class="modal-header">
									        <h4 class="modal-title">删除日志</h4>
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									      </div>
									 
									      <!-- 模态框主体 -->
									      <div class="modal-body table-responsive">
									        你确定要删除日志<span class="font-weight-bold text-danger">{{$log->title}}</span>吗？
									      </div>
									 
									      <!-- 模态框底部 -->
									      <div class="modal-footer">
									      	<form action="{{ route('logs.delete',$log->id) }}" method="post">
									      	{{ method_field('DELETE') }}
									      	{{ csrf_field() }}
									        	<input class="btn btn-danger" type="submit" value="删除" />
									        </form>
									      </div>
									 
									    </div>
									  </div>
									</div>
	   							</sapn><br/>
	   							<span class="small">
	   								最近更新于{{ Carbon\Carbon::parse($log->updated_at)->diffForHumans() }}
	   							</span>
	   							<span class="small">
	   								创建于{{$log->created_at}}
	   							</span>
	   							
	   						</li>
	   					@endforeach
	   				</ul>
	   				{!! $logs->render('vendor.pagination.bootstrap-4') !!}
	   			</div>
  			</div>
		</div>
	</div>
@stop