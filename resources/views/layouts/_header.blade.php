<header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
		<div class="container">
		<a class="nav-brand font-weight-bold logo" href="#">LogSystem</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-team">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="nav-team">
			<ul class="navbar-nav">	
				@if(Auth::check())
				<li class="nav-item">
					<a class="nav-link" href="#">操作</a>
				</li>
				<li class="nav-item dropdown">
			      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			        {{ Auth::user()->name }}
			      </a>
			      <div class="dropdown-menu">
			        <a class="dropdown-item" href="#">个人中心</a>
			        <a class="dropdown-item" href="#">编辑资料</a>
			        <a class="dropdown-item" href="#">退出登录</a>
			      </div>
			    </li>
				@else
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">登录</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('users.create') }}">注册</a>
				</li>
				@endif
			</ul>
		</div>
	</nav>
</header>