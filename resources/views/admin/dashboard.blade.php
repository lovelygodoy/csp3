@extends('layouts/adminapplayout')

@section('title')
	dashboard
@endsection

@section('main_content')

	@if(Session::has('status'))
	    <div class="alert alert-success">
	     {{Session::get('status')}}
	    </div>
	@endif

	<button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add">
          <span class="glyphicon glyphicon-plus"></span> Add New User
    </button> <br><br>

	<div class="users">
		
		<table>
		
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				
			</tr>

				@foreach($users as $user)
			
			<tr>

				<td> {{ $user->name }}</td>
				<td> {{ $user->email }}</td>

				@if($user->role_id == "1")
				<td>  Regular
					<div class="btn-toolbar pull-right">
						<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit{{ $user->id }}"><span class="glyphicon glyphicon-edit"></span></button>

					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $user->id }}"><span class="glyphicon glyphicon-remove"></span></button> 
					</div>
				</td>

				@else
				<td> Admin
					<div class="btn-toolbar pull-right"> 
						<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit{{ $user->id }}"><span class="glyphicon glyphicon-edit"></span></button>

						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $user->id }}"><span class="glyphicon glyphicon-remove"></span></button> 
					</div>
				</td>

				@endif

			</tr>

				<!-- modal -->

			<div class="modal fade" id="edit{{ $user->id }}" role="dialog">
			    <div class="modal-dialog">
			    
			      	<!-- Modal content-->
			      	<div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Edit Role</h4>
				        </div>

				        <div class="modal-body">
				        	<form method="POST" action='{{url("admin/$user->id/edit")}}'>
							{{ csrf_field() }}
							
								<input type="hidden" name="user_id" value=" {{ $user->id}} " >

								<div class="form-group">

									<select name="role_id" class="form-control" >
								      	<option value="1"> Regular </option>
								      	<option value="2"> Admin </option>
							   		</select>

								</div>		
								
						
								<button type="submit" class="btn btn-default">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>




			<div class="modal fade" id="delete{{ $user->id }}" role="dialog">
				<div class="modal-dialog">
						    
						      	<!-- Modal content-->
					<div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Delete User Account</h4>
				        </div>

				        <div class="modal-body">
				        	<form method="POST" action='{{url("/admin/$user->id/delete")}}'>
							{{ csrf_field() }}
							
							<div class="form-group">
								Are you sure you want to delete this account?
							</div>
							
							<div class="btn-toolbar">
								<button type="submit" class="btn btn-default">Yes</button>
						
				          		<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				        	</div>

							</form>
				        </div>

					</div>
						      
				</div>
			</div>




			<div class="modal fade" id="add" role="dialog">
			    <div class="modal-dialog">
			    
			      	<!-- Modal content-->
			      	<div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Add New Account</h4>
				        </div>

				        <div class="modal-body">
				        	<form method="POST" action='{{url("admin/create")}}'>
							{{ csrf_field() }}
							

								<div class="form-group">
									Name: <input class="form-control" type="text" name="name" required >
								</div>
								<div class="form-group">
									Email: <input class="form-control" type="email" name="email" required >
								</div>	
								<div class="form-group">
									Password: <input class="form-control" type="password" name="password" required>
								</div>			
						
								<button type="submit" class="btn btn-default">Create</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			@endforeach
		
		</table>
		<div class="pager">
			{{ $users->links() }}
			</div>
	</div>

@endsection


