@extends('layouts/adminapplayout')

@section('title')
	dashboard
@endsection

@section('main_content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Hi, Admin!</div>
						<div class="panel-body">
							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
								You are now logged in.
						</div>
				</div>
			</div>
		</div>
	</div>

@endsection