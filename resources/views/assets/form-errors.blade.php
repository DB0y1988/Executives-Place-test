@if ($errors->any())
<div class="alert alert-danger pb-2">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif