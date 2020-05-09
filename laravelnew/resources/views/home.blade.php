@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard<button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add New</button></div>

              <a href="{{route('news.add') }}" class="btn btn-danger">news add</a>
              
              
               <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('insert-post') }}" method="POST">
      @csrf
      <div class="modal-body">
        
  <div class="form-group">
    <label for="exampleFormControlInput1"> Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1"> author</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="author" name="author">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1"> tag</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="tag" name="tag">
  </div>
  
  
      
      <div class="form-group">
    <label for="exampleFormControlTextarea1"> description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">submit</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="{{route('all.posts') }}">All Posts</a>
                   @php
                   $post=App\Post::all();
                   
                   @endphp
                   
                   
                   <div class="container">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">author</th>
      <th scope="col">tag</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($post as $value)
   
    <tr>
      <th scope="row">{{ $value->id }}</th>
      <td>{{ $value->title }}</td>
      <td>{{ $value->author }}</td>
      <td>{{ $value->tag }}</td>
      <td>
          <a href="{{ URL::to('edite-post/'.$value->id)}}" class="btn btn-sm btn-info">Edit</a>
          <a href="{{ URL::to('delete-post/'.$value->id)}}" class="btn btn-sm btn-danger" id="delete">delete</a>
          
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
</div>
                   
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
