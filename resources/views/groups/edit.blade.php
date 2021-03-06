@extends('layouts.default')
@section('title','编辑组')
@section('content')
	<div class="row">
	<div class="col-sm-12">
		<ul class="nav nav-tabs nav-justified text-nowrap group-tab">
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.show',$group->id) }}">组</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('logs.create',$group->id) }}">写日志</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.show_users',$group->id) }}">会员</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link active" href="{{ route('groups.edit',$group->id) }}">设置</a>
			    </li>
		</ul>
		<div class="group-tab-page">
			<h3 class="text-center">编辑邮件组</h3>
			@include('layouts._error')
				<form action="{{ route('groups.update',$group->id) }}" method="post" enctype="multipart/form-data">
				  {{ method_field('PATCH') }}
				  {{ csrf_field() }}
				  <div class="form-group">
				  	<label for="name">组名：</label>
				    <input type="text" class="form-control" name="name" value="{{ old('name',$group->name) }}">
				  </div>
				  <div class="form-group">
				  	<label for="group_head">组头像：</label>
				    <input type="file" class="form-control" name="group_head" >
				  </div>
				   @if($group->group_head)
	                 <img class="thumbnail img-responsive" src="{{ $group->group_head }}" width="100" />
	                 <br/>
	               @endif
				  <div class="form-group">
				  	<label for="commit">描述：</label>
				    <textarea class="form-control" rows="5" name="commit">{{ old('commit',$group->commit) }}</textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">保存组</button>
				</form>
			</div>
			<hr class="border-success">
			<div class="card border-danger" style="margin-top:20px;">
			  <div class="card-header bg-danger text-light">删除组</div>
			  <div class="card-body">删除组将导致所有组内资源被删除<br/><span class="font-weight-bold">删除的组将无法恢复!</span></div> 
			  <div class="card-footer">
			  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteGroup">
  				删除组
			  </button>
			</div>
			  <div class="modal fade" id="deleteGroup">
  			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title">删除组</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body text-danger">
			        你确定要移除该组吗?移除之后将无法恢复！！
			      </div>
			      <div class="modal-footer">
			        <form action="{{route('groups.destroy',$group->id)}}" method="post">
			        	{{method_field('DELETE')}}
			      		{{csrf_field()}}
			        	<input type="submit" value="确定" class="btn btn-primary" />
			        </form>
			      </div>
			    </div>
  			</div>
			</div>
		</div>
	</div>
</div>
@stop