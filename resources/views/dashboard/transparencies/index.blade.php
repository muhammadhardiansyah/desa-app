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
        <h3>Transparansi APBDes</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                APBDes Sidodadi PENDAPATAN
            </div>
            <div class="card-body">
                <table class="table" id="table_posts">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">#</th>
                            <th rowspan="2" class="text-center">Tahun</th>
                            <th colspan="5" class="text-center">PENDAPATAN</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th class="text-center">PAD</th>
                            <th class="text-center">DD</th>
                            <th class="text-center">BHP</th>
                            <th class="text-center">ADD</th>
                            <th class="text-center">Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transparencies as $transparency)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $transparency->tahun }}</td>
                                <td class="text-center">{{ $transparency->PAD }}</td>
                                <td class="text-center">{{ $transparency->DD }}</td>
                                <td class="text-center">{{ $transparency->BHP }}</td>
                                <td class="text-center">{{ $transparency->ADD }}</td>
                                <td class="text-center">{{ $transparency->t_pendapatan }}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-outline-info"
                                        href="/dashboard/transparency/{{ $transparency->id }}"><i
                                            class="bi bi-eye-fill"></i></a>
                                    <a class="btn btn-outline-warning"
                                        href="/dashboard/transparency/{{ $transparency->id }}/edit"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="/dashboard/transparency/{{ $transparency->id }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                APBDes Sidodadi BELANJA
            </div>
            <div class="card-body">
                <table class="table" id="table_posts1">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">#</th>
                            <th rowspan="2"class="text-center">Tahun</th>
                            <th colspan="6" class="text-center">BELANJA</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th class="text-center">Pemerintah</th>
                            <th class="text-center">Pembangunan</th>
                            <th class="text-center">Pembinaan</th>
                            <th class="text-center">Pemberdayaan</th>
                            <th class="text-center">Darurat</th>
                            <th class="text-center">Total Belanja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transparencies as $transparency)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $transparency->tahun }}</td>
                                <td class="text-center">{{ $transparency->pemerintahan }}</td>
                                <td class="text-center">{{ $transparency->pembangunan }}</td>
                                <td class="text-center">{{ $transparency->pembinaan }}</td>
                                <td class="text-center">{{ $transparency->pemberdayaan }}</td>
                                <td class="text-center">{{ $transparency->darurat }}</td>
                                <td class="text-center">{{ $transparency->t_belanja }}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-outline-info"
                                        href="/dashboard/transparency/{{ $transparency->id }}"><i
                                            class="bi bi-eye-fill"></i></a>
                                    <a class="btn btn-outline-warning"
                                        href="/dashboard/transparency/{{ $transparency->id }}/edit"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="/dashboard/transparency/{{ $transparency->id }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                APBDes Sidodadi
            </div>
            <div class="card-body">
                <table class="table" id="table_posts2">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Total Pendapatan</th>
                            <th class="text-center">Total Belanja</th>
                            <th class="text-center">Surplus/Defisit</th>
                            <th class="text-center">Penerimaan Pembiayaan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transparencies as $transparency)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $transparency->t_pendapatan }}</td>
                                <td class="text-center">{{ $transparency->t_belanja }}</td>
                                <td class="text-center">{{ $transparency->surdef }}</td>
                                <td class="text-center">{{ $transparency->p_pembiayaan }}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-outline-info"
                                        href="/dashboard/transparency/{{ $transparency->id }}"><i
                                            class="bi bi-eye-fill"></i></a>
                                    <a class="btn btn-outline-warning"
                                        href="/dashboard/transparency/{{ $transparency->id }}/edit"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="/dashboard/transparency/{{ $transparency->id }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash-fill"></i>
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
        $(document).ready(function() {
            $('#table_posts1').DataTable({
                retrieve: true,
                responsive: true
            });
        });
        $(document).ready(function() {
            $('#table_posts2').DataTable({
                retrieve: true,
                responsive: true
            });
        });
        // let jquery_datatable = $("#table_posts").DataTable();
    </script>
@endpush
