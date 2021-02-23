@extends('layouts.main');

@section('content')
    <div class="container my-3">
        <h1 class="my-4">Il mio blog</h1>
        <div class="row">

            @foreach ($posts as $post)
                <div class="col-4 my-3 align-items-stretch d-flex">
                    <div class="card">
                        <img src="{{ $post->img }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <div class="text-left my-3">
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection