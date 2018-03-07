@extends('layouts/applayout')

@section('title')
	{{$post->title}}
@endsection

@section('main_content')

<div class="row">
	<div class="col-xs-12 col-sm-8 blog-main">
		<div class="panel panel-default">
		    <div class="panel-body">

		    	@guest
		    	<h3>{{$post->title}}</h3>
		    	<small>by <strong>{{$post->user->name}}</strong> on {{date_format($post->created_at, 'M d, Y')}}</small><br>
		    	<div class="image">{!! Html::image('/image/'.$post->photo) !!}</div><br>
		    	<p>{!! $post->content !!}</p>
		    
		    	<hr>

		    	<div class="comments">

			    	<span class="glyphicon glyphicon-comment"></span> <strong>{{ $post->comments()->count() }}</strong> <small>Comment/s</small><br><br>

			    	<ul class="list-group">
	    	
			    	@foreach($post->comments as $comment)

			    	<li class="list-group-item">

			    		<small> 
			    		
				    		<strong>{{ $comment->user->name}}</strong>	
				    		<i class="far fa-clock"></i><em> {{ $comment->created_at->diffForHumans() }} </em><br>	
				    		{{ $comment->content }} <br>
				    		
				    	</small>    		

			    	</li>

			    	@endforeach
			    	</ul>
		
			    </div>

		    </div>
		    
	  	</div>


	  	<div class="card">
	  		<div class="card-block">
			  	<form method="POST" >
					{{ csrf_field() }}
					
					<div class="form-group">
						<textarea class="form-control" name="content" placeholder="Please login to comment here." disabled="true"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Add Comment</button>
					</div>	
						
				</form>
			</div>

		</div>

				
		    	@else
		    	<h3>{{$post->title}}</h3>
		    	<small>by <strong>{{$post->user->name}}</strong> on {{date_format($post->created_at, 'M d, Y')}}</small><br>
		    	<div class="image">{!! Html::image('/image/'.$post->photo) !!}</div><br>
		    	<p>{!! $post->content !!}</p>
		    
		    	<hr>
			    <div class="comments">

			    	<span class="glyphicon glyphicon-comment"></span> <strong>{{ $post->comments()->count() }}</strong> <small>Comment/s</small><br><br>

			    	<ul class="list-group">
	    	
			    	@foreach($post->comments as $comment)

			    	<li class="list-group-item">
			    		<small> 
			    	

			    			@if( Auth::user()->id === $comment->user->id )

			    		<div class="btn-group pull-right">
						    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit{{$comment->id}}"><span class="glyphicon glyphicon-edit"></span></button>

						    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{$comment->id}}"><span class="glyphicon glyphicon-remove"></span></button>


				    	</div>


				    	<div class="modal fade" id="edit{{$comment->id}}" role="dialog">
						    <div class="modal-dialog modal-sm">
						    
						      	<!-- Modal content-->
						      	<div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Edit Comment</h4>
							        </div>

							        <div class="modal-body">
							        	<form method="POST" action='{{url("posts/$comment->id/edit")}}'>
										{{ csrf_field() }}
										
										<div class="form-group">
											Content: <textarea class="form-control" name="content">{{ $comment->content }}</textarea>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-default">Update</button>
										</div>

										</form>
							        </div>

							        
						      	</div>
						      
						    </div>
						</div>

						<div class="modal fade" id="delete{{$comment->id}}" role="dialog">
						    <div class="modal-dialog">
						    
						      	<!-- Modal content-->
						      	<div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Delete Post</h4>
							        </div>

							        <div class="modal-body">
							        	<form method="POST" action='{{url("posts/$comment->id/deleteComment")}}'>
										{{ csrf_field() }}
										
										<div class="form-group">
											Are you sure you want to delete this comment?
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

						@else 

						 <button type="button" class="btn btn-primary btn-sm pull-right ">Reply</button>

						 @endif
						
							<strong>{{ $comment->user->name}}</strong> 

				    		<i class="far fa-clock"></i><em> {{ $comment->created_at->diffForHumans() }}</em> <br>	
				    		{{ $comment->content }} <br>
				    		
				    	</small>

			    	</li>

			    	@endforeach
			    	</ul>
		
			    </div>

		    </div>
		    
	  	</div>


	  	<div class="card">
	  		<div class="card-block">
			  	<form method="POST" action="/posts/{{ $post->id }}/comment">
					{{ csrf_field() }}
					
					<div class="form-group">
						<textarea class="form-control" name="content" placeholder="Your comment here..."></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Add Comment</button>
					</div>	
						
				</form>
			</div>

		</div>

		@endguest

		

	</div>

	@include('partials/sidebar')
</div>

@endsection