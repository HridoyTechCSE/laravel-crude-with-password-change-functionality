@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
    <form action="{{ url('update-post/'.$post->id) }}" method="POST">
      @csrf
      <div class="modal-body">
        
  <div class="form-group">
    <label for="exampleFormControlInput1"> Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{  $post->title }}" name="title">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1"> author</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{  $post->author }}" name="author">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1"> tag</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{  $post->tag }}" name="tag">
  </div>
  
  
      
      <div class="form-group">
    <label for="exampleFormControlTextarea1"> description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{  $post->description }}</textarea>
  </div>

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">update</button>
        
      </div>
      </form>
</div>

@endsection