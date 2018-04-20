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
				<li class="nav-item dropdown" style="padding-top:3px;">
					<a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">操作</a>
					<div class="dropdown-menu">
						<a class="btn btn-success btn-block" role="button" href="{{ route('groups.create') }}">新建分组</a>
					</div>
				</li>
				<li class="nav-item dropdown">
			      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <img src="{{ Auth::user()->head }}" class="img-responsive rounded-circle" width="30px" height="30px">
			        {{ Auth::user()->name }}
			      </a>
			      <div class="dropdown-menu">
			        <a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}">个人中心</a>
			        <a class="dropdown-item" href="{{ route('users.edit',Auth::user()->id) }}">编辑资料</a>
			        <hr />
			        <form action="{{ route('logout') }}" method="post">
			        	{{ csrf_field() }}
			        	{{ method_field('DELETE') }}
			        	<input type="submit" class="btn btn-danger btn-block" value="退出登录" />
			    	</form>
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