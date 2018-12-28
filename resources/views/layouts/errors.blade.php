<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<ul class="border p-4 rounded alert-danger" role="alert">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>