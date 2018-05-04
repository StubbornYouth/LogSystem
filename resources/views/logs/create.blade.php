@extends('layouts.default')
@section('title','写日志')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs nav-justified text-nowrap group-tab">
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.show',$group->id) }}">组</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link active" href="{{ route('logs.create',$group->id) }}">写日志</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.show_users',$group->id) }}">会员</a>
			    </li>
			     @can('update',$group)
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('groups.edit',$group->id) }}">设置</a>
			    </li>
			    @endcan
			</ul>
			<div class="group-tab-page">
				<h3 class="text-center">
					<span class="glyphicon glyphicon-check"></span>
					@if($log->id)
						编辑日志
					@else
						新建日志
					@endif
				</h3>
				<hr/>
				@include('layouts._error')
				@if($log->id)
				<form action="{{ route('logs.update',$log->id) }}" method="post">
				{{ method_field('PATCH') }}
				@else
				<form action="{{ route('logs.store',$group->id) }}" method="post">
				@endif
				  {{ csrf_field() }}
				  <div class="form-group">
				    <input type="text" class="form-control" name="title" placeholder="日志标题,可以不填哦!" value="{{ old('title',$log->title) }}">
				  </div>
				   <div class="form-group">
	               	<textarea class="form-control" id="editor" rows="8" name="content" placeholder="今天累了吗?快来写一下~ eg(工作内容，进度...)">{{ old('content',$log->content) }}</textarea>
	          	  </div>
				  <button type="submit" class="btn btn-primary">保存</button>
				</form>
			</div>
		</div>
	</div>
@stop
@section('script')
	<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
    $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
            upload: {
            	//处理上传图片的URL
                url: '{{ route('logs.upload_img') }}',
                //防止crsf跨站请求
                params: { _token: '{{ csrf_token() }}' },
                //服务器端获取图片的键值
                fileKey: 'upload_file',
                //最多允许上传图片数
                connectionCount: 3,
                //上传时关闭页面提醒
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            //支持图片黏贴
            pasteImage: true,
        });
    });
    </script>

@stop