<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '首页') - 日志管理平台</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('style')
  </head>
  <body>
    @include('layouts._header')
    <div class="container">
    @yield('content')
    @include('layouts._footer')
    </div>
  </body>
  <script type="text/javascript" src="/js/app.js"></script>
  @yield('script')
</html>