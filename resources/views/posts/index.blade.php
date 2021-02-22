@extends('layouts.main')

@section('header')
  <h1 class="mt-5">Tutti gli articoli</h1>
@endsection

@section('content')
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>Author</th>
        <th>Image</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->subtitle }}</td>
          <td>{{ $post->author }}</td>
          <td><img src="{{ $post->img }}" alt=""></td>
          <td>
            <a href="{{ route("posts.show", ['post' =>$post->id]) }}" class="btn btn-primary">MOSTRA</a>
          </td>
          <td class="text-center">
            <a href="{{ route("posts.edit", ['post' =>$post->id]) }}" class="btn btn-primary"><i class="far fa-edit"></i></a>
          </td>
          <td>
            <form action="{{ route('posts.destroy', ['post' =>$post->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr> 
      @endforeach
    </tbody>
  </table>

  <div class="text-right my-4">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Crea nuovo post</a>
  </div>
@endsection