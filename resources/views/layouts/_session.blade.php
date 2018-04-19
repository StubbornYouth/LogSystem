@foreach(['success','info','danger','warning'] as $msg)
	@if(session()->has($msg))
		<div class="alert alert-{{ $msg }} alert-dismissable session-msg">
			<button type="butoon" class="close" data-dismiss="alert">&times;</button>
			{{ session()->get($msg) }}
		</div>
	@endif
@endforeach