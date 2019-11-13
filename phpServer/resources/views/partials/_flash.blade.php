@if(Session::get('message flash'))
	<div class="alert alert-{{Session::get('message flash')['type']}}">
		{{Session::get('message flash')['content']}}
	</div>
@endif