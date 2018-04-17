@extends('layouts.default')
@section('title','个人信息')
@section('content')
<div class="">
	<div class="container">
		@include('layouts._session')
		<div class="row">
			<div class="col-md-12"></div>
				{{ $user->name }}-{{ $user->email }}
			</div>
		</div>
	</div>
</div>
@stop