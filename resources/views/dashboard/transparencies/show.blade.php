@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container col-10 my-3 p-3">
        <article>
            <h2 class="text-center">APBDes Sidodadi {{ $transparency->tahun }}</h2>
            <div class="container my-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Pendapatan</h3>
                    </div>
                    <div class="row align-items-center">
                        <div class="card-body col-lg-6 col-12">
                            <div id="chart-pendapatan"></div>
                        </div>
                        <div class="card-body col-lg-6 col-12">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">Pendapatan Asli Desa</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->PAD }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">Dana Desa</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->DD }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">Bagi Hasil Pajak</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->BHP }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">Anggaran Dana Desa</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->ADD }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5">Total Pendapatan</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->t_pendapatan }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-body col-4">
                            <div id="chart-visitors-profile1"></div>
                        </div> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>Belanja</h3>
                    </div>
                    <div class="row align-items-center">
                        <div class="card-body col-lg-4 col-12">
                            <div id="chart-belanja"></div>
                        </div>
                        <div class="card-body col-lg-8 col-12">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">Pemerintahan</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->pemerintahan }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">Pembangunan</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->pembangunan }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">pembinaan</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->pembinaan }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5 text-capitalize">pemberdayaan</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->pemberdayaan }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5">Bidang Darurat dan Mendesak</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->darurat }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5">Total Belanja</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->t_belanja }}</span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="fs-5">Surplus/Defisit</span>
                                </div>
                                <div class="col-1">
                                    <span class="fs-5">=</span>
                                </div>
                                <div class="col-6">
                                    <span class="fs-5">{{ $transparency->surdef }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-body col-4">
                            <div id="chart-visitors-profile1"></div>
                        </div> --}}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <a href="/dashboard/transparency"
                        class="btn btn-outline-success d-flex justify-content-center col-12">
                        <i class="bi bi-arrow-bar-left mx-2"></i>
                        Back to all transparency
                    </a>
                </div>
                <div class="col-4">
                    <a href="/dashboard/transparency/{{ $transparency->id }}/edit"
                        class="btn btn-outline-warning d-flex justify-content-center col-12">
                        <i class="bi bi-pencil-square mx-2"></i>
                        Edit
                    </a>
                </div>
                <form action="/dashboard/transparency/{{ $transparency->id }}" method="POST" class="d-inline col-4">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger d-flex justify-content-center col-12"
                        onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash-fill mx-2"></i>
                        Hapus
                    </button>
                </form>

                <form action="">
                    <input type="hidden" id="pembangunan" value="{{ $transparency->pembangunan }}">
                    <input type="hidden" id="pemerintahan" value="{{ $transparency->pemerintahan }}">
                    <input type="hidden" id="pembinaan" value="{{ $transparency->pembinaan }}">
                    <input type="hidden" id="pemberdayaan" value="{{ $transparency->pemberdayaan }}">
                    <input type="hidden" id="darurat" value="{{ $transparency->darurat }}">
                    <input type="hidden" id="PAD" value="{{ $transparency->PAD }}">
                    <input type="hidden" id="DD" value="{{ $transparency->DD }}">
                    <input type="hidden" id="BHP" value="{{ $transparency->BHP }}">
                    <input type="hidden" id="ADD" value="{{ $transparency->ADD }}">
                </form>
                {{-- <a href="/dashboard/posts" class="btn btn-outline-danger d-flex justify-content-center col-4">
                    <i class="bi bi-trash-fill mx-2"></i>
                    Hapus
                </a> --}}
            </div>
        </article>
    </div>
@endsection

@push('scripts')
    <script>
        function currencyToInt(string) {
            var currency = string;
            let number = parseFloat(string.replace(/[^0-9,-]+/g, ""));
            return number;
        }
        var pembangunan = document.querySelector('#pembangunan').value;
        var pemerintahan = document.querySelector('#pemerintahan').value;
        var pembinaan = document.querySelector('#pembinaan').value;
        var pemberdayaan = document.querySelector('#pemberdayaan').value;
        var darurat = document.querySelector('#darurat').value;
        let optionsBelanja = {
            series: [currencyToInt(pemerintahan), currencyToInt(pembangunan), currencyToInt(pembinaan), currencyToInt(
                pemberdayaan), currencyToInt(darurat)],
            labels: ['Bidang Pemerintahan', 'Bidang Pembangunan', 'Bidang Pembinaan', 'Bidang Pemberdayaan',
                'Bidang Darurat dan Mendesak'
            ],
            colors: ['#97989a', '#e37810', '#0091de', '#75b64e', '#dc117a'],
            chart: {
                type: 'donut',
                width: '100%',
                height: '350px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }
        var chartBelanja = new ApexCharts(document.getElementById('chart-belanja'),
            optionsBelanja);
        chartBelanja.render()

        var PAD = document.querySelector('#PAD').value;
        var DD = document.querySelector('#DD').value;
        var BHP = document.querySelector('#BHP').value;
        var ADD = document.querySelector('#ADD').value;
        var options = {
            series: [{
                data: [currencyToInt(PAD), currencyToInt(DD), currencyToInt(BHP), currencyToInt(ADD)]
            }],
            chart: {
                type: 'bar',
                height: 200
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['PAD', 'DD', 'BHP', 'ADD'],
            }
        };

        var chartPendapatan = new ApexCharts(document.querySelector("#chart-pendapatan"), options);
        chartPendapatan.render();
    </script>
@endpush
