@extends('layout.main')

@section('container')
    <!-- Header Page -->
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Single Post</h2>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Navbar & Jumbotron Page -->
    <div class="container col-8 my-3 p-3 border rounded">
        <article>
            <h2 class="text-center">{{ $post->title }}</h2>

            <h5 class="text-center">By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">
                    {{ $post->author->name }} </a> in <a href="/posts?category={{ $post->category->slug }}">
                    {{ $post->category->name }} </a>
            </h5>

            <div class="container col-8">
                @if ($post->image)
                    <img class="img-fluid img-thumbnail" src="/storage/{{ $post->image }}" alt="">
                @else
                    <img src="https://source.unsplash.com/random/400×600/?{{ $post->category->name }}" class="img-fluid img-thumbnail" alt="">
                @endif
            </div>
            <article class="my-3">
                {!! $post->body !!}
            </article>
        </article>
    </div>
    <a href="/">Back</a>
@endsection
