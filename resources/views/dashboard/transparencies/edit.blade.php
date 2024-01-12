@extends('layout.dashboard.main')
@include('partials.form')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Update Transparencies</h3>
    </div>

    <form action="/dashboard/transparency/{{ $transparency->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-lg-10 mx-auto">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id=""
                    name='tahun' placeholder="Masukkan judul" value="{{ old('tahun', $transparency->tahun) }}" required autofocus>
                <label for="floatingInput">Tahun</label>
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="PAD" id="currency-field0"
                    class="form-control @error('PAD') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('PAD', $transparency->PAD) }}" required>
                <label for="floatingInput">Pendapatan Asli Desa</label>
                @error('PAD')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="DD" id="currency-field1"
                    class="form-control @error('DD') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('DD', $transparency->DD) }}" required>
                <label for="floatingInput">Dana Desa</label>
                @error('DD')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="BHP" id="currency-field2"
                    class="form-control @error('BHP') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('BHP', $transparency->BHP) }}" required>
                <label for="floatingInput">Bagi Hasil Pajak</label>
                @error('BHP')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="ADD" id="currency-field3"
                    class="form-control @error('ADD') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('ADD', $transparency->ADD) }}" required>
                <label for="floatingInput">Anggaran Dana Desa</label>
                @error('ADD')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="t_pendapatan" id="currency-field4"
                    class="form-control @error('t_pendapatan') is-invalid @enderror"
                    pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$" placeholder="Masukkan judul" value="{{ old('t_pendapatan', $transparency->t_pendapatan) }}"
                    required>
                <label for="floatingInput">Total Pendapatan</label>
                @error('t_pendapatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="pemerintahan" id="currency-field5"
                    class="form-control @error('pemerintahan') is-invalid @enderror" pattern="^\Rp\d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('pemerintahan', $transparency->pemerintahan) }}" required>
                <label for="floatingInput">Bidang Pemerintahan</label>
                @error('pemerintahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="pembangunan" id="currency-field6"
                    class="form-control @error('pembangunan') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('pembangunan', $transparency->pembangunan) }}" required>
                <label class="text-capitalize" for="floatingInput">Bidang pembangunan</label>
                @error('pembangunan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="pembinaan" id="currency-field7"
                    class="form-control @error('pembinaan') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('pembinaan', $transparency->pembinaan) }}" required>
                <label class="text-capitalize" for="floatingInput">Bidang pembinaan</label>
                @error('pembinaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="pemberdayaan" id="currency-field8"
                    class="form-control @error('pemberdayaan') is-invalid @enderror"
                    pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$" placeholder="Masukkan judul"
                    value="{{ old('pemberdayaan', $transparency->pemberdayaan) }}" required>
                <label class="text-capitalize" for="floatingInput">Bidang pemberdayaan</label>
                @error('pemberdayaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="darurat" id="currency-field9"
                    class="form-control @error('darurat') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('darurat', $transparency->darurat) }}" required>
                <label class="text-capitalize" for="floatingInput">Bidang darurat dan mendesak</label>
                @error('darurat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="t_belanja" id="currency-field10"
                    class="form-control @error('t_belanja') is-invalid @enderror"
                    pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$" placeholder="Masukkan judul" value="{{ old('t_belanja', $transparency->t_belanja) }}" required>
                <label class="text-capitalize" for="floatingInput">Total Belanja</label>
                @error('t_belanja')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="surdef" id="currency-field11"
                    class="form-control @error('surdef') is-invalid @enderror" pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$"
                    placeholder="Masukkan judul" value="{{ old('surdef', $transparency->surdef) }}" required>
                <label class="text-capitalize" for="floatingInput">Surplus/Defisit</label>
                @error('surdef')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="p_pembiayaan" id="currency-field12"
                    class="form-control @error('p_pembiayaan') is-invalid @enderror"
                    pattern="^\Rp \d{1,3}(\.\d{3})*(,\d+)?$" placeholder="Masukkan judul"
                    value="{{ old('p_pembiayaan', $transparency->p_pembiayaan) }}" required>
                <label class="text-capitalize" for="floatingInput">Penerimaan Pembiayaan</label>
                @error('p_pembiayaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Input image</label>
                {{-- <input type="hidden" name="oldImg" value="{{ $post->image }}"> --}}
                @if ($transparency->image)
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="/storage/{{ $transparency->image }}">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()">
                @endif
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-warning">
                <i class="bi bi-plus-square mr-1"></i>
                <span>Update Transparansi</span>
            </button>

        </div>


    </form>


    <script>
        for (let i = 0; i <= 12; i++) {
            const currencyField = document.querySelector("#currency-field" + i);
            currencyField.addEventListener("keyup", function(e) {
                const sanitized = this.value.replace(/[^0-9,]/g, "");
                const parts = sanitized.split(",");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                this.value = "Rp. " + parts.join(",");
            });
        }
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
