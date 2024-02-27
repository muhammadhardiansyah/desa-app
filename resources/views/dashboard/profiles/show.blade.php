@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container col-10 my-3 p-3">
        <article>

            <h2 class="text-center">{{ $profile->title }}</h2>

            <div class="container col-8">
                @if ($profile->image)
                <div class="container col-8">
                    <img class="img-fluid img-thumbnail d-block mx-auto" src="/storage/{{ $profile->image }}" alt="">
                </div>
                @endif
            </div>
            <article class="my-3">
                {!! $profile->description !!}
            </article>
            <div class="row">
                <div class="col-4">
                    <a href="/dashboard/profile" class="btn btn-outline-success d-flex justify-content-center col-12">
                        <i class="bi bi-arrow-bar-left mx-2"></i>
                        Back to all profiles
                    </a>
                </div>
                <div class="col-4">
                    <a href="/dashboard/profile/{{ $profile->slug }}/edit" class="btn btn-outline-warning d-flex justify-content-center col-12">
                        <i class="bi bi-pencil-square mx-2"></i>
                        Edit
                    </a>
                </div>
                <form action="/dashboard/profile/{{ $profile->slug }}" method="POST" class="d-inline col-4">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger d-flex justify-content-center col-12"
                        onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash-fill mx-2"></i>
                        Hapus
                    </button>
                </form>
                {{-- <a href="/dashboard/posts" class="btn btn-outline-danger d-flex justify-content-center col-4">
                    <i class="bi bi-trash-fill mx-2"></i>
                    Hapus
                </a> --}}
            </div>
        </article>
    </div>
@endsection
