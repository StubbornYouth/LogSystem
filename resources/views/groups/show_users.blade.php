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
			     @can('update',$group)
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.edit',$group->id) }}">设置</a>
			    </li>
			    @endcan
			</ul>
			@include('layouts._session')
			@can('update',$group)
			<form action="{{ route('addUser',$group->id) }}" method="post">
			  {{ csrf_field() }}
			  <div class="form-group" style="margin-top:20px;">
			    <label for="name">添加新成员到组<sapn class="font-weight-bold">{{ $group->name }}</sapn></label><br/>
			    <input type="text" class="form-control-self" name="name" placeholder="通过用户名来添加用户" value="{{ old('name') }}">
			    <input type="submit" id="submit" class="btn btn-success" value="添加到组" />
			  </div>
			</form>
			@endcan
			<div class="group-tab-page">
				<h5 class="font-weight-bold">现有成员</h5>
				<hr/>
				<ul class="list-unstyled">
					@foreach($users as $user)
					<li class="group-info clearfix">
						<img class="img-responsive rounded-circle float-left" src="{{ $user->head }}" style="width:40px;margin-right:5px;" alt="头像" />@can('destroy',[$group,$user])
						<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteUser">
  							踢出组
			 			</button> 
			 			@endcan
			 			 <div class="modal fade" id="deleteUser">
			  			  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title">踢出组</h4>
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						      </div>
						      <div class="modal-body text-danger">
						        你确定要将{{$user->name}}移出该组吗?
						      </div>
						      <div class="modal-footer">
						       <form action="{{ route('delUser',[$group->id,$user->id]) }}" method="post">
									{{ csrf_field() }}
		        					{{ method_field('DELETE') }}
									<input class="btn btn-danger float-right" type="submit" value="踢出组" />
								</form>
						      </div>
						    </div>
			  			</div>
						</div>
						<a class="text-dark font-weight-bold" href="{{ route('users.show',$user->id) }}">{{ $user->real_name }}</a>
						<span class="input-group-addon">@</span>
						<span class="text-dark">{{ $user->name }}</span>
						<br>
						<span>加入于{{ \Carbon\Carbon::parse($user->getRelations())->diffForHumans() }}</span>
					</li>
					@endforeach
				</ul>
				{!! $users->render('vendor.pagination.bootstrap-4') !!}
			</div>
		</div>
	</div>
@stop