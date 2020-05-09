@extends('welcome')




@section('content')

 
       @php
       $post=DB::table('newss')->get();
       
       
       @endphp
       
       @foreach($post as $var)
        <div class="post-preview">
          <a href="{{URL::to('view-post/'.$var->id)}}">
            <h2 class="post-title">
              {{ $var->title }}
            </h2>
            <img src="{{ URL::to($var->image) }}" alt="" height="100%" width="100%">
            
            <h3 class="post-subtitle">
               {{ $var->details }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"> {{ $var->author }}</a>
            </p>
        </div>
        <hr>
        
        @endforeach
        
        
        
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
@endsection