@extends('welcome')

@section('content')
<div class="post-preview">
          <a href="#">
            <h2 class="post-title">
              {{ $post->title }}
            </h2>
            <img src="{{ URL::to($post->image) }}" alt="" height="100%" width="100%">
            
            <h3 class="post-subtitle">
               {{ $post->details }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"> {{ $post->author }}</a>
            </p>
        </div>
@endsection


