<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '首页') - 日志管理平台</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._header')
    @yield('content')
    <script type="text/javascript" src="/js/app.js"></script>
  </body>
</html>