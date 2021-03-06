@extends('layouts.default')
@section('title','主页')
@section('content')
	<div class="row home">
		<div class="col-sm-12">
			@include('layouts._session')
			<div class="clearfix">
				<h4 class="home-title float-left">邮件组</h4>
				<a class="btn btn-success float-right" role="button" href="{{ route('groups.create') }}">新的组</a>
			</div>
			<hr/>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link text-dark" data-toggle="tab" href="#all">所有</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-dark active" data-toggle="tab" href="#person">你创建的</a>
			  </li>
			</ul>
			<div class="tab-content">
			  <div class="tab-pane container" id="all">
			  	@if(!$allPage['sum'])
			  	<div class="jumbotron" style="margin-top:20px;">
				  <h1>你加入的邮件组</h1> 
				  <p>你当前还没有加入邮件组哦!</p>
				  <a href="{{ route('groups.create')}}" class="btn btn-success" role="button">创建新组</a> 
				</div>
				@else
			  	<ul class="list-unstyled">
			  	@foreach($allPage['data'] as $v)
			  		<li class="group-info clearfix">
			  			<img width="40" height="40" class="img-responsive rounded-circle float-left" src="{{ $v['group_head'] }}" alt="组头像" />
			  			<span class="font-weight-bold"><a href="{{ route('groups.show',$v['id']) }}" class="text-dark">{{ $v['name'] }}</a></span>
			  			<span class="float-right">
			  			<a href="{{ route('groups.show_users',$v['id']) }}" title="组人数" >
          					<span class="glyphicon glyphicon-user"></span>
       					</a>{{ $v['peo_number'] }}&nbsp;
       					<a href="{{ route('logs.create',$v['id']) }}" title="写日志">
			  				<span class="glyphicon glyphicon-edit"></span>
			  			</a>
			  			@if(Auth::user()->id===$v['create_id'])
			  			<a href="{{ route('groups.edit',$v['id']) }}" title="设置">
			  				<span class="glyphicon glyphicon-cog"></span>
			  			</a>
			  			@endif
			  			</span>
			  			<br>
			  			<span class="small">{{ $v['commit'] }}</span>
			  			<span class="float-right text-dark">创建于{{ \Carbon\Carbon::parse($v['created_at'])->diffForHumans() }}</span>
			  		</li>
			  	@endforeach
			  	</ul>
			  	@if($allPage['sum']>1)
			  	<ul id="page" class="pagination">
			  		<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(1)">首页</a></li>
  					<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(<?php echo $allPage['prev']; ?>)">上一页</a></li>
  					<li class="page-item disabled"><a class="page-link" href="">{{ $allPage['page'] }} | {{ $allPage['sum'] }}</a></li>
  					<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(<?php echo $allPage['next']; ?>)">下一页</a></li>
  					<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(<?php echo $allPage['sum']; ?>)">尾页</a></li>
			  	</ul>
				@endif
				@endif
			  </div>
			  <div class="tab-pane active container" id="person">
			  	@if(!$perPage['sum'])
			  	<div class="jumbotron" style="margin-top:20px;">
				  <h1>你创建的邮件组</h1> 
				  <p>你当前还没有创建邮件组哦!</p>
				  <a href="{{ route('groups.create')}}" class="btn btn-success" role="button">创建新组</a> 
				</div>
				@else
			  	<ul class="list-unstyled">
			  	@foreach($perPage['data'] as $v)
			  		<li class="group-info clearfix">
			  			<img width="40" height="40" class="img-responsive rounded-circle float-left" src="{{ $v->group_head }}" alt="组头像" />
			  			<span class="font-weight-bold"><a href="{{ route('groups.show',$v->id) }}" class="text-dark">{{ $v->name }}</a></span>
			  			<span class="float-right">
			  			<a href="{{ route('groups.show_users',$v->id) }}" title="组人数" >
          					<span class="glyphicon glyphicon-user"></span>
       					</a>{{ $v->peo_number }}&nbsp;
       					<a href="{{ route('logs.create',$v->id) }}" title="写日志">
			  				<span class="glyphicon glyphicon-edit"></span>
			  			</a>
			  			<a href="{{ route('groups.edit',$v->id) }}" title="设置">
			  				<span class="glyphicon glyphicon-cog"></span>
			  			</a>
			  			
			  			</span>
			  			<br>
			  			<span class="small">{{ $v->commit }}</span>
			  			<span class="float-right text-dark">创建于{{ \Carbon\Carbon::parse($v->created_at)->diffForHumans() }}</span>
			  		</li>
			  	@endforeach
			  	</ul>
			  	@if($perPage['sum']>1)
			  	<ul id="page" class="pagination">
			  		<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="noFreshPage(1)">首页</a></li>
  					<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="noFreshPage(<?php echo $perPage['prev']; ?>)">上一页</a></li>
  					<li class="page-item disabled"><a class="page-link" href="">{{ $perPage['page'] }} | {{ $perPage['sum'] }}</a></li>
  					<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="noFreshPage(<?php echo $perPage['next']; ?>)">下一页</a></li>
  					<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="noFreshPage(<?php echo $perPage['sum']; ?>)">尾页</a></li>
			  	</ul>
				@endif
			  	@endif
			  </div>
			</div>
		</div>
	</div>
@stop
@section('script')
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/ajax.js"></script>
@stop
