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
  	<ul id="page" class="pagination">
  		<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(1)">首页</a></li>
		<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(<?php echo $allPage['prev']; ?>)">上一页</a></li>
		<li class="page-item disabled"><a class="page-link" href="">{{ $allPage['page'] }} | {{ $allPage['sum'] }}</a></li>
		<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(<?php echo $allPage['next']; ?>)">下一页</a></li>
		<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="allPage(<?php echo $allPage['sum']; ?>)">尾页</a></li>
  	</ul>