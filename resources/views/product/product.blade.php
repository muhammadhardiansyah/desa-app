@extends('layout.main')

@section('container')
    <!-- Header Page -->
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Produk Unggulan</h2>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Navbar & Jumbotron Page -->
    <div class="container col-8 my-3 p-3 border rounded">
        <article>
            <h2 class="text-center">{{ $product->name }}</h2>

            <h5 class="text-center">By <a href="#a" class="text-decoration-none">
                    {{ $product->by }} </a> in <a href="#a">
                    product</a>
            </h5>

            <div class="container col-8 d-flex justify-content-center">
                @if ($product->image)
                    <img class="img-fluid img-thumbnail" src="/storage/{{ $product->image }}" style="min-height: 400px; max-height:410px; object-fit: cover;" alt="">
                @else
                    <img src="https://via.placeholder.com/600x300" style="min-height: 400px; max-height:410px; object-fit: cover;" class="img-fluid img-thumbnail" alt="">
                @endif
            </div>
            <article class="my-3">
                {!! $product->description !!}
            </article>
        </article>
    </div>
    <a href="/">Back</a>
@endsection
