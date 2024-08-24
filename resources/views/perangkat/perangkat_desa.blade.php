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
    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5 text-center">
                        <h4 class="section-title">Seluruh Perangkat Kepengurusan di Desa Sidodadi</h4>
                    </div>
                </div>
                @foreach ($staff as $staf)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-lg-0 pb-4">
                        <div class="team-thumb bg-white shadow-lg">
                            @if ($staf->user->image)
                                <img src="/storage/{{ $staf->user->image }}" class="about-image img-fluid mb-5 pb-5" style="min-height: 500px; max-height: 510px; object-fit: cover;" alt="" >
                            @else
                                <img src="https://via.placeholder.com/600x300" class="about-image img-fluid mb-5 pb-5" style="min-height: 500px; max-height: 510px; object-fit: cover;"  alt="">
                            @endif
                            <div class="team-info">
                                <h4 class="mb-2">
                                    {{ $staf->user->name }}
                                </h4>
                                <span class="badge">{{ $staf->position->name }}</span>
                            </div>

                            {{-- <div class="social-share">
                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-pinterest"></a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection