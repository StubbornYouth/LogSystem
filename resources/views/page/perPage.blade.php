<ul class="list-unstyled">
	@foreach($perPage['data'] as $v)
		<li class="group-info clearfix text-nowrap">
			<img width="40" height="40" class="img-responsive rounded-circle float-left" src="{{ $v->group_head }}" alt="组头像" />
			<span class="font-weight-bold"><a href="#" class="text-dark">{{ $v->name }}</a></span>
			<a class="float-right" href="{{ route('groups.edit',$v->id) }}">编辑</a>
			<br>
			<span class="small">{{ $v->commit }}</span>
			<span class="float-right text-dark">创建于{{ \Carbon\Carbon::parse($v->updated_at)->diffForHumans() }}</span>
		</li>
	@endforeach
</ul>
<ul id="page" class="pagination">
	<li class="page-item"><a class="page-link" href="javascript:noFreshPage(1)">首页</a></li>
  	<li class="page-item"><a class="page-link" href="javascript:noFreshPage(<?php echo $perPage['prev']; ?>)">上一页</a></li>
  	<li class="page-item disabled"><a class="page-link" href="">{{ $perPage['page'] }} | {{ $perPage['sum'] }}</a></li>
  	<li class="page-item"><a class="page-link" href="javascript:noFreshPage(<?php echo $perPage['next']; ?>)">下一页</a></li>
  	<li class="page-item"><a class="page-link" href="javascript:noFreshPage(<?php echo $perPage['sum']; ?>)">尾页</a></li>
</ul>