@extends('layout.dashboard.main')
@include('partials.form')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Update Staff</h3>
    </div>

    <form action="/dashboard/staff/{{ $staff->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id"
                aria-label="Floating label select example" id="title" required>
                <option {{ old('user_id') == '' ? 'selected' : '' }} value="">Select User</option>
                @foreach ($users as $user)
                    <option {{ old('user_id', $staff->user_id ) == $user->id ? 'selected' : '' }} value="{{ $user->id }}">
                        {{ $user->name }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Select User</label>

            @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <select class="form-select @error('position_id') is-invalid @enderror" name="position_id"
                aria-label="Floating label select example" id="position_id" required>
                <option {{ old('position_id') == '' ? 'selected' : '' }} value="">Select Position</option>
                @foreach ($positions as $position)
                    <option {{ old('position_id', $staff->position_id) == $position->id ? 'selected' : '' }} value="{{ $position->id }}">
                        {{ $position->name }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Select User</label>

            @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-warning">
            <i class="bi bi-plus-square mr-1"></i>
            <span>Update Staff</span>
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
