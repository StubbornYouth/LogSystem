@extends('layouts.default')
@section('title','创建组')
@section('content')
<div class="row email-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-8 border ">
		<h3 class="text-center">新建邮件组</h3>
		<hr/>
		@include('layouts._error')
			<form action="{{ route('groups.store') }}" method="post">
			  {{ csrf_field() }}
			  <input type="hidden" name="create_id" value="{{Auth::user()->id}}" />
			  <input type="hidden" name="users" value="{{Auth::user()->id}}" />
			  <div class="form-group">
			    <input type="text" class="form-control" name="name" placeholder="请填写组名" value="{{ old('name') }}">
			  </div>
			  <div class="form-group">
			    <textarea class="form-control" rows="5" name="commit" placeholder="请输入组的描述" >{{ old('commit') }}</textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">保存</button>
			</form>
	</div>
	<div class="col-sm-2"></div>
</div>
@stop