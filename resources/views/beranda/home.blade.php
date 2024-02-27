@extends('layout.main')

@section('container')
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="text-center mb-5 pb-2">
                        <h1 class="text-white">Desa Sidodadi - Blitar</h1>

                        <p class="text-white">Website resmi Desa Sidodadi, Kecamatan Garum, Kabupaten Blitar</p>

                        <a href="/posts" class="btn custom-btn smoothscroll mt-3">Mulai lihat postingan</a>
                    </div>

                    <div class="owl-carousel owl-theme">
                        @foreach ($staff as $staf)
                            <div class="owl-carousel-info-wrap item">
                                @if ($staf->user->image)
                                    <img src="storage/{{ $staf->user->image }}" class="owl-carousel-image img-fluid pb-5"
                                        style="min-height: 450px; object-fit: cover;" alt="">
                                @else
                                    <img src="https://source.unsplash.com/random/400×600/?people"
                                        class="owl-carousel-image img-fluid  pb-5"
                                        style="min-height: 500px; object-fit: cover;" alt="">
                                @endif
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">
                                        {{ $staf->user->name }}
                                    </h4>
                                    <span class="badge">{{ $staf->position->name }}</span>
                                </div>
                                {{-- <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-instagram"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-podcast-section section-padding pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mb-4 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="/images/home/desa-1.jpg" style="min-height: 450px; object-fit: cover;" alt=""
                                class="img-fluid rounded">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="display-4 justify-text">Kantor Kepala Desa Sidodadi</h2>
                            <p class="fs-5 lead pb-3 text-dark">Kecamatan Garum, Kabupaten Blitar</p>

                            <p class="fs-5 lead pb-3 text-dark justify-text">Terletak di Sumber, Slorok, Kec. Garum,
                                Kabupaten Blitar, Jawa Timur. Tepatnya berada di sebelah Barat Pasar Kutukan, Slorok.</p>
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-primary bg-gradient d-flex justify-content-center align-items-center"
                                        href="https://goo.gl/maps/c2TkHxYmKzfvMLec7">
                                        <i class="bi bi-geo-alt-fill fs-4 pe-2"></i>
                                        <span class="fs-4">Lihat di Gmaps</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-outline-primary bg-gradient d-flex justify-content-center align-items-center"
                                        href="/contact">
                                        <i class="bi bi-geo-alt-fill fs-4 pe-2"></i>
                                        <span class="fs-4">Lihat di Contact</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trending-podcast-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Postingan</h4>
                    </div>
                </div>
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="/posts/{{ $post->slug }}">
                                        @if ($post->image)
                                            <img src="storage/{{ $post->image }}" class="custom-block-image img-fluid"
                                                style="min-height: 210px; max-height:220px; object-fit: cover;"
                                                alt="">
                                        @else
                                            <img src="https://source.unsplash.com/random/400×600/?{{ $post->category->name }}"
                                                class="custom-block-image img-fluid"
                                                style="min-height: 210px; max-height:220px; object-fit: cover;"
                                                alt="">
                                        @endif
                                    </a>
                                </div>

                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="/posts/{{ $post->slug }}">
                                            {{ $post->title }}
                                        </a>
                                    </h5>

                                    <div class="profile-block d-flex">
                                        @if ($post->author->image)
                                            <img src="storage/{{ $post->author->image }}"
                                                class="profile-block-image img-fluid"
                                                style="min-height:; max-height:; object-fit: cover;" alt="">
                                        @else
                                            <img src="https://source.unsplash.com/random/600×400/?people"
                                                class="profile-block-image img-fluid"
                                                style="min-height:; max-height:; object-fit: cover;" alt="">
                                        @endif
                                        <p>
                                            {{ $post->author->name }}
                                            <strong>{{ $post->category->name }}</strong>
                                        </p>
                                    </div>

                                    <p class="mb-0 justify-text">{!! $post->excerpt !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @push('more_post')
                        <div class="row justify-content-end mt-3">
                            <div class="col-4 d-flex justify-content-end">
                                <a class="btn btn-success bg-gradient" href="/posts">
                                    More Posts
                                    <i class="bi bi-chevron-double-right"></i>
                                </a>
                            </div>
                        </div>
                    @endpush
                @else
                    <div class="col-12">
                        <h5 class="display-5 text-center">No Post Found</h5>
                    </div>
                @endif
            </div>
            @stack('more_post')
        </div>
    </section>

    <section class="latest-podcast-section section-padding pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mb-4 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="/images/home/pelantikan.jpg" style="min-height: 450px; object-fit: cover;" alt=""
                                class="img-fluid rounded">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="display-6 text-start">Pelantikan & Pengambilan Sumpah Jabatan</h2>
                            <p class="fs-5 lead pb-3 text-dark">Kepala Desa, Sekretaris Desa, dan Perangkat Desa Lainnya</p>

                            <p class="fs-5 lead pb-3 text-dark justify-text">Untuk mengetahui dan mengenal jajaran perangkat desa di Kantor Kepala Desa Sidodadi, klik di bawah ini!</p>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary bg-gradient d-flex justify-content-center align-items-center"
                                        href="/perangkat_desa">
                                        <i class="bi bi-person-badge fs-4 pe-2"></i>
                                        <span class="fs-4">Perangkat Desa</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="topics-section section-padding pb-0 mb-3" id="section_3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Produk Unggulan</h4>
                    </div>
                </div>
                @if ($products->count())
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-overlay">
                                <a href="/product/{{ $product->slug }}" class="custom-block-image-wrap">
                                    @if ($product->image)
                                        <img src="storage/{{ $product->image }}" class="custom-block-image img-fluid"
                                            style="min-height: 210px; max-height:220px; object-fit: cover;"
                                            alt="">
                                    @else
                                        <img src="https://source.unsplash.com/random/400×600/?product"
                                            class="custom-block-image img-fluid"
                                            style="min-height: 210px; max-height:220px; object-fit: cover;"
                                            alt="">
                                    @endif
                                </a>
                                <div class="custom-block-info custom-block-overlay-info">
                                    <h5 class="mb-1">
                                        <a href="/product/{{ $product->slug }}">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <p class="badge mb-0">{{ $product->by}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 border">
                        <h4 class="text-center lead fs-3">No Post Found</h4>
                    </div>
                @endif
            </div>
        </div>
    </section>



@endsection

@push('carousel')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script>
@endpush
