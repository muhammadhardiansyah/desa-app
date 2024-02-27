@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-12 mx-auto" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show col-12 mx-auto" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show col-12 mx-auto" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="page-heading">
        <h3>Gallery</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Gallery Images
            </div>
            <div class="card-body">
                <table class="table" id="table_posts">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gallery->title }}</td>
                                <td class="text-center col-3">
                                    @if ($gallery->image)
                                        <img src="/storage/{{ $gallery->image }}" class="img-fluid p-1" alt="">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="NULL">
                                    @endif
                                </td>
                                <td class="col-2">
                                    <a class="btn btn-outline-warning mb-1 me-1" href="/dashboard/gallery/{{ $gallery->slug }}/edit">
                                        <i class="bi bi-pencil-square"></i>
                                        {{-- <span>Edit</span> --}}
                                    </a>
                                    <form action="/dashboard/gallery/{{ $gallery->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger mb-1 me-1" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash-fill"></i>
                                            {{-- <span>Hapus</span> --}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table_posts').DataTable({
                retrieve: true,
                responsive: true
            });
        });
        // let jquery_datatable = $("#table_posts").DataTable();
    </script>
@endpush
