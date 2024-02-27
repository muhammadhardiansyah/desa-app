{{-- @dd($posts) --}}

@extends('layout.main')

@section('container')
    <h1 class="mb-5">Post Cateogry: {{ $category; }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2>
                <a href="/index/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            {{-- <h5>By: {{ $post->author }}</h5> --}}
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection
