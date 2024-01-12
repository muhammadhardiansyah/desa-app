@extends('layout.dashboard.main')
@include('partials.form')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Update Category</h3>
    </div>

    <form action="/dashboard/position/{{ $position->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name='name'
                placeholder="Masukkan nama kategori" value="{{ old('name', $position->name) }}" required autofocus>
            <label for="floatingInput">Nama</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                placeholder="Masukkan judul" value="{{ old('slug', $position->slug) }}" readonly required>
            <label for="floatingInput">Slug</label>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-warning">
            <i class="bi bi-plus-square mr-1"></i>
            <span>Update Position</span>
        </button>



    </form>



    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/category/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
