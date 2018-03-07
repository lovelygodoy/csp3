@extends('layouts/applayout')

@section('title')
	{{ 'You Are Blessed | My Posts' }}
@endsection

@section('main_content')

<script>
	CKEDITOR.replace('ckeditor');
</script>

	@if(Session::has('status'))
	    <div class="alert alert-success">
	     {{Session::get('status')}}
	    </div>
	@endif

	<div class="row">

		<div class="col-xs-12  col-sm-8 blog-main">
			<div class="newPost">
				<h3>Add New Post</h3>

				<form method="POST" action="/posts/create" enctype="multipart/form-data">
					{{ csrf_field() }}

					@include ('partials.errors')
					
					<div class="form-group">
						Title: <input class="form-control" type="text" name="title">
					</div>

					<div class="form-group">
					<small>Upload cover photo</small>
						<input type="file" name="photo"><br>
					</div>

					<div class="form-group">
						Content: <textarea class="ckeditor form-control" id ="ckeditor" name="content"></textarea>

					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Publish</button>
					</div>

				</form>
			</div>

			<hr>

			<div class="posts">
				<h3>ARTICLES</h3>
				@foreach($posts as $post)
					<div class="list">
					    	<div class="btn-group pull-right">
							    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit{{$post->id}}"><span class="glyphicon glyphicon-edit"></span></button>

							    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{$post->id}}"><span class="glyphicon glyphicon-remove"></span></button>
					    	</div>

					    	<h3><a href='{{url("posts/$post->id")}}' target="_blank">{{ $post->title }}</a></h3><small> on {{date_format($post->created_at, 'M d, Y |  H:i a')}}</small>
						    
					    	<div class="modal fade" id="edit{{$post->id}}" role="dialog">
							    <div class="modal-dialog">
							    
							      	<!-- Modal content-->
							      	<div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Edit Post</h4>
								        </div>

								        <div class="modal-body">
								        	<form method="POST" action='{{url("posts/$post->id/editPost")}}' enctype="multipart/form-data">
											{{ csrf_field() }}
											
											<div class="form-group">
												Title: <input class="form-control" type="text" name="title" value="{{ $post->title }}" required >
											</div>
											<div class="form-group">
												{!! Html::image('/image/'.$post->photo) !!}<br>
											</div>
											
											<div class="form-group">
												Content: <textarea class="ckeditor form-control" id="ckeditor" name="content" required>{!! $post->content !!}</textarea>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-default">Save</button>
											</div>

											</form>
								        </div>

								        <div class="modal-footer">
								          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        </div>
							      	</div>
							      
							    </div>
							</div>

							<div class="modal fade" id="delete{{$post->id}}" role="dialog">
							    <div class="modal-dialog">
							    
							      	<!-- Modal content-->
							      	<div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Delete Post</h4>
								        </div>

								        <div class="modal-body">
								        	<form method="POST" action='{{url("posts/$post->id/delete")}}'>
											{{ csrf_field() }}
											
											<div class="form-group">
												Are you sure you want to delete this post?
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

				  	</div>

				@endforeach
					<div class="pager">
					{{ $posts->links() }}
					</div>

			</div>

		</div>

		@include('partials/sidebar')
	</div>

@endsection


