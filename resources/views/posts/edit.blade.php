@extends('layouts.main')

@section('header')
	<h1 class="mt-5">Modifica il post</h1>    
@endsection

@section('content')
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route("posts.update", $post->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="form-group">
			<label for="title">Titolo</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ $post->title }}">
		</div>
		<div class="form-group">
			<label for="subtitle">Sottotitolo</label>
			<input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ $post->subtitle }}">
		</div>
		<div class="form-group">
			<label for="author">Autore</label>
			<input type="text" class="form-control" name="author" id="author" placeholder="Autore" value="{{ $post->author }}">
		</div>
			<div class="form-group">
			<label for="text">Testo</label>
			<textarea name="text" class="form-control" id="text" rows="6" placeholder="Inserisci il testo del tuo post">{{ $post->text }}</textarea>
		</div>
		<div class="form-group">
			<label for="img">Immagine</label>
			<input type="text" class="form-control" name="img" id="img" placeholder="Immagine" value="{{ $post->img }}">
		</div>

		<div class="form-group">
			<label for="post_status">Stato del post</label>
			<select class="custom-select" name="post_status" id="post_status">
				<option value="draft" {{ $post->info->post_status == 'draft' ? 'selected' : '' }}>Draft</option>
				<option value="private" {{ $post->info->post_status == 'private' ? 'selected' : '' }}>Private</option>
				<option value="public" {{ $post->info->post_status == 'public' ? 'selected' : '' }}>Public</option>
			</select>
		</div>

		<div class="form-group">
			<label for="comments_status">Stato Commenti</label>
			<select class="custom-select" name="comments_status" id="comments_status">
				<option value="open" {{ $post->info->comments_status == 'open' ? 'selected' : '' }}>Open</option>
				<option value="closed {{ $post->info->comments_status == 'closed' ? 'selected' : '' }}">Closed</option>
				<option value="private" {{ $post->info->comments_status == 'private' ? 'selected' : '' }}>Private</option>
			</select>
		</div>

		<div class="my-4">
			<button type="submit" class="btn btn-success">Salva</button>
			<a href="{{ route('posts.index') }}" class="btn btn-secondary">Indietro</a>
		</div>
    </form>
@endsection