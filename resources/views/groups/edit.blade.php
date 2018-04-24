@extends('layouts.default')
@section('title','编辑组')
@section('content')
	<div class="row email-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-8 border">
		<h3 class="text-center">编辑邮件组</h3>
		<hr/>
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
			  <button type="submit" class="btn btn-primary">保存</button>
			  <button type="button" class="btn btn-black float-right" onclick="javascript:history.back()">取消</button>
			</form>
	</div>
	<div class="col-sm-2"></div>
</div>
@stop