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

    <!-- Content Page -->
    <section class="latest-podcast-section section-padding" id="section_2">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 mb-4 mb-3">
                        <div class="custom-block d-flex">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="custom-block-icon-wrap">
                                        <div class="section-overlay"></div>
                                        <a href="/posts?category={{ $category->slug }}"
                                            class="custom-block-image-wrap d-flex justify-content-center">
                                            @if ($category->image)
                                                <img src="/storage/{{ $category->image }}" class="img-fluid" style="min-height: 210px; max-height:220px; object-fit: cover;" alt="">
                                            @else
                                                <img src="https://source.unsplash.com/random/400×600/?{{ $category->name }}"
                                                style="min-height: 210px; max-height:220px; object-fit: cover;" class="img-fluid" alt="">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="custom-block-info">
                                        <h5 class="mb-2 text-center">
                                            <a href="/posts?category={{ $category->slug }}">
                                                {{ $category->name }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    </main>
@endsection
