@extends('layouts.default')
@section('title','重置密码')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 register">
			<h5>密码重置</h5>
			<hr/>
			@include('layouts._error')
			@if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
			<form action="{{ route('password.email') }}" method="post">
			  {{ csrf_field() }}
			  <div class="form-group">
			    <label for="email">Email 地址:</label>
			    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
			  </div>
			  <button type="submit" class="btn btn-primary">发送重置密码邮件</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
@stop