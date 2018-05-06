<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>组周日志</title>
</head>
<body>
  <h1 class="text-info"><span style="color:#f00;">{{$group_name}} 每周日志汇总----{{date('Y-m-d')}}</span></h1>
  @foreach($data as $k=>$logs)
  <div>
  	<h2>组员:{{ $k }}</h2>
    @foreach($logs as $log)
    <h3>标题:{{$log['title']}}&nbsp;时间:{{$log['date']}}</h3>
  	<h3>内容:</h3>
  	<div>{!! $log['content'] !!}</div>
    <br/>
  	@endforeach
  </div>
  <hr/>
  @endforeach
</body>
</html>