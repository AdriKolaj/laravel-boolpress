@extends('layouts.main')

@section('header')
  <h1 class="mt-5">Dettaglio articolo</h1>
@endsection

@section('content')
  <table class="table table-striped table-bordered">

    @foreach ($post->getAttributes() as $key => $value)
        <tr>
          <td><strong>{{ $key }}</strong></td>
          <td>{{ $value }}</td>
        </tr>
    @endforeach

    <tr>
      <td><strong>post_status</strong></td>
      <td>{{ $post->info->post_status }}</td>
    </tr>
    <tr>
      <td><strong>comments_status</strong></td>
      <td>{{ $post->info->comments_status }}</td>
    </tr>
  </table>

  <h2>Comments</h2>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Text</th>
        <th>Updated At</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($post->comments as $comment)
        <tr>
          <td>{{ $comment->id }}</td>
          <td>{{ $comment->author }}</td>
          <td>{{ $comment->text }}</td>
          <td>{{ $comment->updated_at }}</td>
          <td>{{ $comment->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
  </table>

@endsection

@section('footer')
<div class="text-right my-4">
  <a href="{{ route("posts.index") }}" class="btn btn-lg btn-dark">Torna all'elenco dei post</a>  
</div>    
@endsection