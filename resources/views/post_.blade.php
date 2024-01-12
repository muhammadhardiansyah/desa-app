@extends('layout.main')

@section('container')
    <article>
        <h2>{{ $post->title}}</h2>

        <h5>By <a href="/authors/{{ $post->author->username}}" class="text-decoration-none"> {{ $post->author
        ->name }} </a> in <a href="/category/{{ $post->category->slug }}"> {{ $post->category->name }} </a></h5>

        {!! $post->body !!}
    </article>

    <a href="/">Back</a>
@endsection
