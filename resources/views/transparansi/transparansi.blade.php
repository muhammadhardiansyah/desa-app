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
    @if ($transparency != null)
        <div class="container col-10 my-3 p-3">
            <article>
                <h2 class="text-center">APBDes Sidodadi {{ $transparency->tahun }}</h2>
                <div class="container my-3">
                    <div class="card mb-5 shadow">
                        <div class="card-header bg-danger bg-gradient">
                            <h3 class="text-white text-center">Pendapatan</h3>
                        </div>
                        <div class="row align-items-center p-3 mb-3">
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
                    <div class="card mb-5 shadow">
                        <div class="card-header bg-success bg-gradient">
                            <h3 class="text-white text-center">Belanja</h3>
                        </div>
                        <div class="row align-items-center p-3 mb-3">
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
            </article>
        </div>
    @else
    <div class="container col-8">
        <h3 class="text-center m-5 px-3 py-5 border rounded shadow">Transparencies Not Found</h3>
    </div>
    @endif
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
