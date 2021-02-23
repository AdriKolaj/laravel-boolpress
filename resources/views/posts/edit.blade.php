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
				<option value="closed" {{ $post->info->comments_status == 'closed' ? 'selected' : '' }}>Closed</option>
				<option value="private" {{ $post->info->comments_status == 'private' ? 'selected' : '' }}>Private</option>
			</select>
		</div>

		<h3 class="mt-4">Tags</h3>
		@foreach ($tags as $tag)
			<div class="form-group">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
					@if($post->tags->contains($tag->id)) checked @endif
					>
					<label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
				</div>
			</div>
		@endforeach

		<h3 class="mt-4">Images</h3>
		@foreach ($images as $image)
			<div class="form-group">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="image-{{ $image->id }}" name="images[]" value="{{ $image->id }}"
					@if($post->images->contains($image->id)) checked @endif
					>
					<label class="custom-control-label" for="image-{{ $image->id }}">{{ $image->alt }}
						<img src="{{ $image->link }}" alt="{{ $image->alt }}" style="width: 50px">
					</label>
				</div>
			</div>
		@endforeach

		<div class="my-4">
			<button type="submit" class="btn btn-success">Salva</button>
			<a href="{{ route('posts.index') }}" class="btn btn-secondary">Indietro</a>
		</div>
    </form>
@endsection