@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
@foreach ($posts as $post)
  <div class="col-md-8 col-md-2 mx-auto">
	<div class="card-wrap">
	  <div class="card">
		<div class="card-header align-items-center d-flex">
		  <a class="no-text-decoration" href="{{route('users.show', Auth::user()->id)}}">
			@if ($post->user->profile_photo)
				<img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_photo) }}"/>
			@else
				<img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
			@endif
		  </a>
		  <a class="black-color no-text-decoration" title="{{ $post->user->name }}" href="{{route('users.show', Auth::user()->id)}}">
			<strong>{{ $post->user->name }}</strong>
		  </a>
		@if ($post->user->id == Auth::user()->id)
			<form name="form_name{{$post->id}}" method="POST" action="{{route('posts.delete', $post->id)}}">
				@csrf
				<a class="ml-auto mx-0 my-auto" rel="nofollow" href="javascript:form_name{{$post->id}}.submit()">
					<div class="delete-post-icon">
					</div>
				</a>
			</form>
		@endif
		</div>

		<a href="{{route('users.show', Auth::user()->id)}}">
		  <img src="/storage/post_images/{{ $post->id }}.jpg" class="card-img-top" />
		</a>


	  </div>
	</div>
  </div>
@endforeach
@endsection