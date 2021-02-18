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
@endsection

@section('footer')
<div class="text-right">
  <a href="{{ route("posts.index") }}" class="btn btn-lg btn-dark">Torna all'elenco dei post</a>  
</div>    
@endsection