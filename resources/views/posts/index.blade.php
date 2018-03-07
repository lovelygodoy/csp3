@extends('layouts/applayout')

@section('title')
	{{ 'You Are Blessed | Home' }}
@endsection	

@section('main_content')

	@if(Session::has('status'))
	    <div class="alert alert-success">
	     {{Session::get('status')}}
	    </div>
	@endif

	<div class="blog-header">
	        <img src="{!! asset('image/img.jpg') !!}" style="width:100%; height: 100%; ">
	 </div><br>

	<div class="row">
		<div class="col-xs-12 col-sm-8 blog-main">
			

			@foreach($posts as $post)
				<div class="panel panel-default col-xs-12">
			    	<div class="panel-body col-xs-12">
			    		<h3><a href='{{url("posts/$post->id")}}' target="_blank"> {{ $post->title }}</a></h3>
			    		<small><strong>{{$post->user->name}}</strong> on {{date_format($post->created_at, 'M d, Y')}}</small><br><br>

			    	<div class="image">{!! Html::image('/image/'.$post->photo) !!}</div> <br>

			    		<div class="postcontent"><p>{!! $post->content !!} </p></div><a href='{{url("posts/$post->id")}}' target="_blank"><strong>|Continue Reading|</strong></a>
			    	</div>
	  			</div>
			@endforeach


		<div class="pager">
		{{ $posts->links() }}
		</div>

		</div>

			@include('partials/sidebar')
	</div><br><br>


@include('partials/footer')



@endsection



