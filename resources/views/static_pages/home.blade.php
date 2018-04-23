@extends('layouts.default')
@section('title','主页')
@section('content')
	<div class="row home">
		<div class="col-sm-12">
			<div class="clearfix">
				<h4 class="home-title float-left">邮件组</h4>
				<button type="button" class="btn btn-success float-right">新的组</button>
			</div>
			<hr/>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link text-dark active" data-toggle="tab" href="#all">所有</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-dark" data-toggle="tab" href="#person">你创建的</a>
			  </li>
			  </ul>
			</ul>
			<div class="tab-content">
			  <div class="tab-pane active container" id="all"></div>
			  <div class="tab-pane container table-responsive" id="person">
			  	<ul class="list-unstyled">
			  	@foreach($data as $v)
			  		<li class="group-info clearfix text-nowrap">
			  			<img width="40" height="40" class="img-responsive rounded-circle float-left" src="{{ $v->group_head }}" alt="组头像" />
			  			<span class="font-weight-bold"><a href="#" class="text-dark">{{ $v->name }}</a></span>
			  			<a class="float-right" href="#">编辑</a>
			  			<br>
			  			<span class="small">{{ $v->commit }}</span>
			  			<span class="float-right text-dark">创建于{{ $v->updated_at->diffForHumans() }}</span>
			  		</li>
			  	@endforeach
			  	</ul>
			  	<ul class="pagination">
				  <li class="page-item"><a class="page-link" href="#">上一页</a></li>
				  <li class="page-item"><a class="page-link" href="#">1</a></li>
				  <li class="page-item active"><a class="page-link" href="#">2</a></li>
				  <li class="page-item"><a class="page-link" href="#">3</a></li>
				  <li class="page-item"><a class="page-link" href="#">下一页</a></li>
				</ul>
			  </div>
			</div>
		</div>
	</div>
@stop