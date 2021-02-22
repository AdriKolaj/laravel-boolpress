@extends('layouts.main')

@section('header')
	<h1 class="mt-5">Crea un nuovo post</h1>    
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

	<form action="{{ route("posts.store") }}" method="POST">
		@csrf
		@method('POST')

		<div class="form-group">
			<label for="title">Titolo</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ old('title') }}">
		</div>
		<div class="form-group">
			<label for="subtitle">Sottotitolo</label>
			<input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ old('subtitle') }}">
		</div>
		<div class="form-group">
			<label for="author">Autore</label>
			<input type="text" class="form-control" name="author" id="author" placeholder="Autore" value="{{ old('author') }}">
		</div>
			<div class="form-group">
			<label for="text">Testo</label>
			<textarea name="text" class="form-control" id="text" rows="6" placeholder="Inserisci il testo del tuo post">{{ old('text') }}</textarea>
		</div>
		<div class="form-group">
			<label for="img">Immagine</label>
			<input type="text" class="form-control" name="img" id="img" placeholder="Immagine" value="{{ old('img') }}">
		</div>

		<div class="form-group">
			<label for="post_status">Stato del post</label>
			<select class="custom-select" name="post_status" id="post_status">
				<option value="draft">Draft</option>
				<option value="private">Private</option>
				<option value="public">Public</option>
			</select>
		</div>

		<div class="form-group">
			<label for="comments_status">Stato Commenti</label>
			<select class="custom-select" name="comments_status" id="comments_status">
				<option value="open">Open</option>
				<option value="closed">Closed</option>
				<option value="private">Private</option>
			</select>
		</div>

		<div class="my-4">
			<button type="submit" class="btn btn-success">Salva</button>
			<a href="{{ route('posts.index') }}" class="btn btn-secondary">Indietro</a>
		</div>
    </form>
@endsection