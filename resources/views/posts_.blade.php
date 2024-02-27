{{-- @dd($posts) --}}

@extends('layout.main')

@section('container')
<h1 class="m-5 text-center">{{ $title }}</h1>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <article class="mb-5 pb-4 border-bottom">

                    <h2><a href="/index/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>

                    <h5>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> <a href="/category/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }} </a></h5>

                    <p>{{ $post->excerpt }}</p>

                    <a href="/index/{{ $post->slug }}" class="text-decoration-none"> Read More...</a>
                </article>
            </div>
        @endforeach
    </div>
@endsection
