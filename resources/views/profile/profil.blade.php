{{-- {{ dd($galleries->all()) }} --}}
@extends('layout.main')

@section('container')
    <!-- Header Page -->
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">{{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>
    <!-- End of Navbar & Jumbotron Page -->
    <div class="container mb-5">
        <nav>
            <div class="nav nav-tabs d-flex" id="nav-tab" role="tablist">
                @if ($profiles->count())
                    <button class="nav-link active bg-primary bg-gradient text-white" data-bs-toggle="tab"
                        data-bs-target="#{{ $profiles[0]->slug }}" type="button" role="tab"
                        aria-selected="true">{{ $profiles[0]->title }}</button>
                    @foreach ($profiles->skip(1) as $profile)
                        <button class="nav-link bg-primary bg-gradient text-white" data-bs-toggle="tab"
                            data-bs-target="#{{ $profile->slug }}" type="button" role="tab"
                            aria-selected="true">{{ $profile->title }}</button>
                    @endforeach
                    <button class="nav-link bg-primary bg-gradient text-white" data-bs-toggle="tab"
                        data-bs-target="#gallery" type="button" role="tab" aria-selected="true">Gallery</button>
                @endif
                @if (!$profiles->count())
                    <button class="nav-link active bg-primary bg-gradient text-white" data-bs-toggle="tab"
                        data-bs-target="#gallery" type="button" role="tab" aria-selected="true">Gallery</button>
                @endif

            </div>
        </nav>
        <div class="tab-content shadow" id="nav-tabContent">
            @if ($profiles->count())
                <div class="tab-pane fade show active mt-2 p-1" id="{{ $profiles[0]->slug }}" role="tabpanel"
                    tabindex="0">
                    <div class="container col-4">
                        @if ($profiles[0]->image)
                            <img class="img-fluid img-thumbnail" src="/storage/{{ $profiles[0]->image }}" alt="">
                        @endif
                    </div>
                    {!! $profiles[0]->description !!}
                </div>
                @foreach ($profiles as $profile)
                    <div class="tab-pane fade mt-2 p-1" id="{{ $profile->slug }}" role="tabpanel" tabindex="0">
                        <div class="container col-4">
                            @if ($profile->image)
                                <img class="img-fluid img-thumbnail" src="/storage/{{ $profile->image }}" alt="">
                            @endif
                        </div>
                        {!! $profile->description !!}
                    </div>
                @endforeach
                <div class="tab-pane fade mt-2 p-1" id="gallery" role="tabpanel" tabindex="0">
                    <div class="container">
                        @if ($galleries->count())
                            <div class="row">
                                @foreach ($galleries as $gallery)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                                        <a href="#" class="d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#{{ $gallery->slug }}">
                                            <img class="img-fluid rounded"
                                                src="/storage/{{ $gallery->image }}"
                                                style="max-height: 220px; min-height:210px; object-fit:cover;"
                                                alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h4 class="fs-3 text-center text-capitalize">no photos yet</h4>
                        @endif
                    </div>
                </div>
            @endif
            @if (!$profiles->count())
                <div class="tab-pane fade show active mt-2 p-1" id="gallery" role="tabpanel" tabindex="0">
                    <div class="container">
                        @if ($galleries->count())
                            <div class="row">
                                @foreach ($galleries as $gallery)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                                        <a href="#" class="d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#{{ $gallery->slug }}">
                                            <img class="img-fluid rounded"
                                                src="/storage/{{ $gallery->image }}"
                                                style="max-height: 220px; min-height:210px; object-fit: cover;"
                                                alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h4 class="fs-3 text-center">Not Found</h4>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
@if ($galleries->count())
    @foreach ($galleries as $gallery)
        <div class="modal fade" id="{{ $gallery->slug }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="container-fluid">
                    <div class="col-12">
                        <img class="img-fluid rounded" src="/storage/{{ $gallery->image }}" style="object-fit:cover;"
                            alt="">
                        <p class="lead fs-3 text-white mt-2 text-center text-capitalize">
                            {{ $gallery->title }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
