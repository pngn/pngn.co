@extends('app')

@section('content')
<div class="container">
	<div class="row">

		<div class="panel panel-default">
			<div class="panel-heading">Shorten a URL</div>

			<div class="panel-body">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if (session()->has('flash_message'))
					<div class="alert alert-success">
						{{ session('flash_message') }}
					</div>
				@endif

				<form class="form-horizontal" role="form" method="POST" action="{{ route('shorten') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">


					<div class="col-md-10">
						<input type="url" class="form-control" name="url" value="{{ old('url') }}" required>
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary">Shorten!</button>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>
@endsection
