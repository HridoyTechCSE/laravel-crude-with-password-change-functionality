@extends('layouts.app')

@section('content')


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
          <a href="" class="btn btn-sm btn-info">Edit</a>
          <a href="" class="btn btn-sm btn-danger">delete</a>
          
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
</div>

@endsection