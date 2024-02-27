@extends('layout.dashboard.main')
@include('partials.form')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Create New Post</h3>
    </div>

    <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-10 mx-auto">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name='title' placeholder="Masukkan judul" value="{{ old('title') }}" required autofocus>
                <label for="floatingInput">Judul</label>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    placeholder="Masukkan judul" value="{{ old('slug') }}" readonly>
                <label for="floatingInput">Slug</label>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select class="form-select @error('user_id') is-invalid @enderror" name="user_id"
                    aria-label="Floating label select example" required>
                    <option {{ old('user_id') == '' ? 'selected' : '' }} value="">Select Author</option>
                    @foreach ($authors as $author)
                        <option {{ old('user_id') == $author->id ? 'selected' : '' }} value="{{ $author->id }}">
                            {{ $author->name }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Author</label>

                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                    aria-label="Floating label select example" required>
                    <option {{ old('category_id') == '' ? 'selected' : '' }} value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Category</label>

                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Input image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="summernote" class="form-label">Body</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="summernote" style="height: 100px"></textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-plus-square mr-1"></i>
                <span>Create Post</span>
            </button>
        </div>
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
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
    </script>

    <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
        
            oFReader.onload = function (oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection
