<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>组日志</title>
</head>
<body>
  <h1 class="text-info">这是今日{{$group_name}}组的日志汇总</h1>
  @foreach($data as $v)
  <div>
  	<h3>标题:{{ $v['title'] }} 组员:{{ $v['name'] }}</h3>
  	<h3>内容:</h3>
  	<div>{!! $v['content'] !!}</div>
  	<hr/>
  </div>
  @endforeach
</body>
</html>