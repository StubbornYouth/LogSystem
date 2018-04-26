@extends('layouts.default')
@section('title','组成员')
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
			      <a class="nav-link active" href="{{ route('groups.show_users',$group->id) }}">会员</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.edit',$group->id) }}">设置</a>
			    </li>
			</ul>
			<form>
			  <div class="form-group clearfix" style="margin-top:20px;">
			    <label for="addUser">添加新成员到组<sapn class="font-weight-bold">{{ $group->name }}</sapn></label><br/>
			    <input type="text" class="form-control-self float-left" name="addUser" value="{{ old('addUser') }}">
			    <input type="button" class="btn btn-success float-right" value="添加到组" />
			  </div>
			</form>
			<div class="group-tab-page">
				<h5 class="font-weight-bold">现有成员</h5>
				<hr/>
				<ul class="list-unstyled">
					@foreach($users as $user)
					<li class="clearfix">
						<img class="img-responsive rounded-circle float-left" src="{{ $user->head }}" style="width:50px;margin-right:5px;" alt="头像" />
						<a class="text-dark font-weight-bold" href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a>
						<a href="" class="btn btn-danger float-right" style="margin:7px 0px;" role="button">踢出组</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@stop