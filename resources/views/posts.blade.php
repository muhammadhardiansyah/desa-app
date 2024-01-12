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
                @if ($posts->count())
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Lastest Post</h4>
                        </div>
                    </div>
                    <div class="col-12 mb-4 mb-3">
                        <div class="custom-block d-flex">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-12">
                                    <div class="custom-block-icon-wrap">
                                        <div class="section-overlay"></div>
                                        <a href="/posts/{{ $posts[0]->slug }}"
                                            class="custom-block-image-wrap d-flex justify-content-center">
                                            @if ($posts[0]->image)
                                                <img class="img-fluid rounded" src="/storage/{{ $posts[0]->image }}"
                                                    style="min-height: 210px; max-height:220px; object-fit: cover;"
                                                    alt="">
                                            @else
                                                <img src="https://source.unsplash.com/random/400×600/?{{ $posts[0]->category->name }}"
                                                    style="min-height: 210px; max-height:220px; object-fit: cover;"
                                                    class="img-fluid rounded" alt="">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-12">
                                    <div class="custom-block-info">
                                        <h5 class="mb-2 text-center">
                                            <a href="/posts/{{ $posts[0]->slug }}">
                                                {{ $posts[0]->title }}
                                            </a>
                                        </h5>

                                        <div class="profile-block d-flex">
                                            @if ($posts[0]->author->image)
                                                <img src="storage/{{ $posts[0]->author->image }}"
                                                    class="profile-block-image img-fluid rounded"
                                                    style="min-height:; max-height:; object-fit: cover;" alt="">
                                            @else
                                                <img src="https://source.unsplash.com/random/600×400/?people"
                                                    class="profile-block-image img-fluid rounded"
                                                    style="min-height:; max-height:; object-fit: cover;" alt="">
                                            @endif
                                            <p>
                                                <a href="/posts?author={{ $posts[0]->author->username }}">By:
                                                    {{ $posts[0]->author->name }}</a>
                                                <strong> <a
                                                        href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></strong>
                                                <small>{{ $posts[0]->created_at->diffForHumans() }}</small>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mb-0">{{ $posts[0]->excerpt }}</p>
                                    <a class="btn btn-outline-success bg-gradient my-2"
                                        href="/posts/{{ $posts[0]->slug }}">Read more...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">More Post</h4>
                        </div>
                    </div>

                    @foreach ($posts->skip(1) as $post)
                        <div class="col-lg-4 col-md-6 mb-4 mb-3">
                            <div class="custom-block d-flex">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="custom-block-icon-wrap">
                                            <div class="section-overlay"></div>
                                            <a href="/posts/{{ $post->slug }}"
                                                class="custom-block-image-wrap d-flex justify-content-center">
                                                @if ($post->image)
                                                    <img class="img-fluid rounded" src="/storage/{{ $post->image }}"
                                                        style="min-height: 210px; max-height:220px; object-fit: cover;"
                                                        alt="">
                                                @else
                                                    <img src="https://source.unsplash.com/random/400×600/?{{ $post->category->name }}"
                                                        style="min-height: 210px; max-height:220px; object-fit: cover;"
                                                        class="img-fluid rounded" alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="custom-block-info">
                                            <h5 class="mb-2">
                                                <a href="/posts/{{ $post->slug }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>

                                            <div class="profile-block d-flex">
                                                @if ($post->author->image)
                                                    <img src="storage/{{ $post->author->image }}"
                                                        class="profile-block-image img-fluid rounded"
                                                        style="min-height:; max-height:; object-fit: cover;" alt="">
                                                @else
                                                    <img src="https://source.unsplash.com/random/600×400/?people"
                                                        class="profile-block-image img-fluid rounded"
                                                        style="min-height:; max-height:; object-fit: cover;" alt="">
                                                @endif

                                                <p>
                                                    <a href="/posts?author={{ $post->author->username }}">By:
                                                        {{ $post->author->name }}</a>
                                                    <strong> <a
                                                            href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                                                    </strong>
                                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-0">{{ $post->excerpt }}</p>
                                        <a class="btn btn-outline-success bg-gradient my-2"
                                            href="/posts/{{ $post->slug }}">Read more...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center m-5 p-2">No Post Found</h4>
                @endif
                <div class="">
                    {{ $posts->links() }}
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
