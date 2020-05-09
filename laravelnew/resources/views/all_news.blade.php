@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">author</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($news as $value)
   
    <tr>
      <th scope="row">{{ $value->id }}</th>
      <td>{{ $value->title }}</td>
      <td>{{ $value->author }}</td>
      <td><img src="{{ URL::to($value->image) }}" alt="" height="80px" width="80px"></td>
      <td>
          <a href="" class="btn btn-sm btn-info">Edit</a>
          <a href="{{ URL::to('delete-news/'.$value->id)}}" class="btn btn-sm btn-danger" id="delete">delete</a>
          
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
</div>

@endsection