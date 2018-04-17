@foreach(['success','info','danger','warning'] as $msg)
	@if(session()->has($msg))
		<div class="alert alert-{{ $msg }} session-msg">
			{{ session()->get($msg) }}
		</div>
	@endif
@endforeach