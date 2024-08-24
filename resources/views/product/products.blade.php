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
                @if ($products->count())
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Newest Product</h4>
                        </div>
                    </div>
                    <div class="col-12 mb-4 mb-3">
                        <div class="custom-block d-flex">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-12">
                                    <div class="custom-block-icon-wrap">
                                        <div class="section-overlay"></div>
                                        <a href="/product/{{ $products[0]->slug }}"
                                            class="custom-block-image-wrap d-flex justify-content-center">
                                            @if ($products[0]->image)
                                                <img class="img-fluid" src="/storage/{{ $products[0]->image }}"
                                                style="min-height: 210px; max-height:220px; object-fit: cover;" alt="">
                                            @else
                                                <img src="https://via.placeholder.com/600x300"
                                                style="min-height: 210px; max-height:220px; object-fit: cover;" class="img-fluid" alt="">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-12">
                                    <div class="custom-block-info">
                                        <h5 class="mb-2 text-center">
                                            <a href="/product/{{ $products[0]->slug }}">
                                                {{ $products[0]->name }}
                                            </a>
                                        </h5>

                                        <div class="profile-block d-flex">
                                            <p>
                                                <strong> <a href="#a">Product</a></strong>
                                                <a href="#a">By: {{ $products[0]->by }}</a>
                                                <small>{{ $products[0]->created_at->diffForHumans() }}</small>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mb-0">{{ $excerpt }}</p>
                                    <a class="btn btn-outline-success bg-gradient my-2"
                                        href="/product/{{ $products[0]->slug }}">Read more...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">More Product</h4>
                        </div>
                    </div>

                    @foreach ($products->skip(1) as $product)
                        <div class="col-lg-4 col-md-6 mb-4 mb-3">
                            <div class="custom-block d-flex">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="custom-block-icon-wrap">
                                            <div class="section-overlay"></div>
                                            <a href="/product/{{ $product->slug }}"
                                                class="custom-block-image-wrap d-flex justify-content-center">
                                                @if ($product->image)
                                                    <img class="img-fluid" src="/storage/{{ $product->image }}"
                                                    style="min-height: 210px; max-height:220px; object-fit: cover;" alt="">
                                                @else
                                                    <img src="https://via.placeholder.com/600x300"
                                                    style="min-height: 210px; max-height:220px; object-fit: cover;" class="img-fluid" alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="custom-block-info">
                                            <h5 class="mb-2">
                                                <a href="/product/{{ $product->slug }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>

                                            <div class="profile-block d-flex">

                                                <span class="col-4">
                                                    <p><strong> <a href="#a">Product</a></strong></p>
                                                </span>
                                                <span class="col-4">
                                                    <p><a href="#a">By: {{ $product->by }}</a></p>
                                                </span>
                                                <span class="col-4">
                                                    <p><small>{{ $product->created_at->diffForHumans() }}</small></p>
                                                </span>

                                            </div>
                                        </div>
                                        {{-- <p class="mb-0">{{ $post->excerpt }}</p>
                                        <a class="btn btn-outline-success bg-gradient my-2"
                                            href="/posts/{{ $post->slug }}">Read more...</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center m-5 p-2">No Post Found</p>
                @endif
                <div class="">
                    {{ $products->links() }}
                </div>
                {{-- <div class="col-12 mx-auto mb-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center mt-5">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <li class="page-item active"><a class="page-link" href="#">1</a></li>

                            <li class="page-item"><a class="page-link" href="#">2</a></li>

                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}

            </div>
        </div>
    </section>
    </main>

@endsection
