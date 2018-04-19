@extends('layouts.default')
@section('title','个人信息')
@section('content')
	@include('layouts._session')
	<div class="row user">
		<div class="col-sm-3 text-center">
		   		<img class="img-thumbnail" src="{{ $user->head }}" width="200px" height="200px" alt="头像图片" />
		</div>
		<div class="col-sm-9">
			<div class="table-responsive">
				<h2 class="text-center">个人资料</h2>
				<table class="table table-hover table-bordered text-nowrap">
				      <tr>
				        <td>用户名：</td>
				        <td>{{ $user->name }}</td>
				      </tr>
				      <tr>
				        <td>邮箱：</td>
				        <td>{{ $user->email }}</td>
				      </tr>
				      <tr>
				        <td>注册时间：</td>
				        <td>{{ $user->created_at->diffForHumans() }}</td>
				      </tr>
				      <tr>
				        <td>最近更新时间:</td>
				        <td>{{ $user->updated_at->diffForHumans() }}</td>
				      </tr>
				</table>
			</div>	    
		</div>
	</div>
@stop