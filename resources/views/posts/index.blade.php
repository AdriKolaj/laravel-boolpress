@extends('layouts.main')

@section('header')
  <h1 class="mt-5">Tutti gli articoli</h1>
@endsection

@section('content')
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Text</th>
        <th>Image</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->author }}</td>
          <td>{{ $post->text }}</td>
          <td><img src="{{ $post->img }}" alt=""></td>
          <td><a href="{{ route("posts.show", ['post' =>$post->id]) }}" class="btn btn-primary">MOSTRA</a></td>
        </tr> 
      @endforeach
    </tbody>
  </table>
@endsection