@extends('layouts.main');

@section('content')

    <section id="article">

        <header class="text-center mb-4">
            <img src="{{ $post->img }}" alt="{{ $post->title }}">
            <h1 class="mt-4">{{ $post->title }}</h1>
            <h3>{{ $post->subtitle }}</h3>
            <small>{{ $post->author }} - {{ $post->created_at }}</small>
            <div class="text-center">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-primary">{{ $tag->name }}</span>
                @endforeach
            </div>
        </header>
        <main>
            {{ $post->text }}
        </main>
        
    </section>
    
    @if($post->info->comments_status == 'open')
        <section id="comments" class="my-4">
            <h2>Commenti</h2>
            @foreach ($post->comments as $comment)
                <small>{{ $comment->author }} - {{ $comment->created_at }}</small>
                <p>{{ $comment->text }}</p>
            @endforeach
        </section>

        <section id="form">
            <form action="{{ route('add-comment', $post->id) }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="author">Autore</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Inserisci il tuo nickname" value="">
                </div>
                <div class="form-group">
                    <label for="text">Testo</label>
                    <textarea name="text" class="form-control" id="text" rows="6" placeholder="Inserisci il commento"></textarea>
                </div>
                <input type="submit" value="Invia" class="btn btn-success float-right my-4">
            </form>
        </section>
        @endif
        <a class="btn btn-secondary float-left my-4" href="{{ route('blog') }}">Torna al blog</a>

@endsection