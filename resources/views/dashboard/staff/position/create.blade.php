@extends('layout.dashboard.main')
@include('partials.form')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Add Position</h3>
    </div>

    <form action="/dashboard/position" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name='name'
                placeholder="Masukkan nama kategori" value="{{ old('name') }}" required autofocus>
            <label for="floatingInput">Nama</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                placeholder="Masukkan judul" value="{{ old('slug') }}" readonly required>
            <label for="floatingInput">Slug</label>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-plus-square mr-1"></i>
            <span>Create Position</span>
        </button>
    </form>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
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
