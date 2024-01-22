@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-4 order-1">
            <div class="row">
                <div class="col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class=" d-flex align-items-center justify-content-between">

                                    <div class=" flex-shrink-0 badge badge-center rounded-pill bg-label-info">
                                        <i class='bx bx-male-female bx-md'></i>
                                    </div>
                                    <span class="fw-semibold d-block mx-3">Jumlah Mahasiswa</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="{{ route('mahasiswa') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3 class="card-title my-4 mw-75 mh-75">{{ $data['total_mhs'] ?? 0 }}</h3>
                                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                    +72.80%</small> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Total Revenue -->

        <!--/ Total Revenue -->

        <div class="col-12 col-md-8 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class=" d-flex align-items-center justify-content-between">
                                    <div class=" flex-shrink-0 badge badge-center rounded-pill bg-label-warning">
                                        <i class='bx bx-list-ol bx-md'></i>
                                    </div>
                                    <span class="fw-semibold d-block mx-3">Jumlah Kriteria</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="{{ route('kriterias-kriteria') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3 class="card-title text-nowrap my-4 mw-75 mh-75">{{ $data['total_kriteria'] ?? 0 }}</h3>
                                {{-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class=" d-flex align-items-center justify-content-between">

                                    <div class=" flex-shrink-0 badge badge-center rounded-pill bg-label-success">
                                        <i class='bx bxs-upvote bx-md'></i>
                                    </div>
                                    <span class="fw-semibold d-block mx-3">Mahasiswa Terbaik</span>
                                </div>
                                <div class="avatar flex-shrink-0">

                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="{{ route('ranking') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3 class="card-title my-3 mw-75 mh-75">{{ $data['mahasiswa_terbaik'] ?? '' }}</h3>
                                {{-- <div class="text-info fw-semibold">Budiono
                                    Siregar</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <div class="row"> -->

            </div>
        </div>
    </div>
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-6 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Asal Mahasiswa</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="{{ route('mahasiswa') }}">View More</a>
                            {{-- <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                        {{-- <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">8,258</h2>
                            <span>Total Orders</span>
                        </div> --}}
                        {{-- <div id="orderStatisticsChart" style="min-height: 137.55px;">
                            <div id="apexchartsarsaq32i"
                                class="apexcharts-canvas apexchartsarsaq32i apexcharts-theme-light"
                                style="width: 130px; height: 137.55px;">
                                <svg id="SvgjsSvg4273" width="130"
                                    height="137.55" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG4275" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-7, 0)">
                                        <defs id="SvgjsDefs4274">
                                            <clipPath id="gridRectMaskarsaq32i">
                                                <rect id="SvgjsRect4277" width="150" height="173" x="-4.5" y="-2.5"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskarsaq32i"></clipPath>
                                            <clipPath id="nonForecastMaskarsaq32i"></clipPath>
                                            <clipPath id="gridRectMarkerMaskarsaq32i">
                                                <rect id="SvgjsRect4278" width="145" height="172" x="-2" y="-2"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG4279" class="apexcharts-pie">
                                            <g id="SvgjsG4280" transform="translate(0, 0) scale(1)">
                                                <circle id="SvgjsCircle4281" r="44.835365853658544" cx="70.5"
                                                    cy="70.5" fill="transparent"></circle>
                                                <g id="SvgjsG4282" class="apexcharts-slices">
                                                    <g id="SvgjsG4283" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Electronic" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath4284"
                                                            d="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                            fill="rgba(105,108,255,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                            index="0" j="0" data:angle="153" data:startAngle="0"
                                                            data:strokeWidth="5" data:value="85"
                                                            data:pathOrig="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG4285" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Sports" rel="2" data:realIndex="1">
                                                        <path id="SvgjsPath4286"
                                                            d="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                            fill="rgba(133,146,163,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                            index="0" j="1" data:angle="27" data:startAngle="153"
                                                            data:strokeWidth="5" data:value="15"
                                                            data:pathOrig="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG4287" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Decor" rel="3" data:realIndex="2">
                                                        <path id="SvgjsPath4288"
                                                            d="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                            fill="rgba(3,195,236,1)" fill-opacity="1" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                            index="0" j="2" data:angle="90" data:startAngle="180"
                                                            data:strokeWidth="5" data:value="50"
                                                            data:pathOrig="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG4289" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Fashion" rel="4" data:realIndex="3">
                                                        <path id="SvgjsPath4290"
                                                            d="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                            fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-3"
                                                            index="0" j="3" data:angle="90" data:startAngle="270"
                                                            data:strokeWidth="5" data:value="50"
                                                            data:pathOrig="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG4291" class="apexcharts-datalabels-group"
                                                transform="translate(0, 0) scale(1)"><text id="SvgjsText4292"
                                                    font-family="Helvetica, Arial, sans-serif" x="70.5" y="90.5"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="0.8125rem"
                                                    font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                    style="font-family: Helvetica, Arial, sans-serif;">Weekly</text><text
                                                    id="SvgjsText4293" font-family="Public Sans" x="70.5" y="71.5"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="1.5rem"
                                                    font-weight="400" fill="#566a7f"
                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                    style="font-family: &quot;Public Sans&quot;;">38%</text></g>
                                        </g>
                                        <line id="SvgjsLine4294" x1="0" y1="0" x2="141"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine4295" x1="0" y1="0" x2="141"
                                            y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG4276" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                                <div class="apexcharts-tooltip apexcharts-theme-dark">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(105, 108, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(133, 146, 163);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(3, 195, 236);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 4;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(113, 221, 55);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 407px; height: 139px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <ul class="p-0 m-0">

                        @forelse ($data['asal_mahasiswa'] as $jurusan)
                            <li class="d-flex mb-4 pb-1">
                                <div class=" flex-shrink-0 badge badge-center rounded-pill bg-label-info">
                                    <i class='bx bx-purchase-tag'></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2 mx-2">
                                        <h6 class="mb-0">{{ $jurusan['jurusan'] ?? '' }}</h6>
                                        {{-- <small class="text-muted">Mobile, Earbuds, TV</small> --}}
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="fw-medium mb-0">{{ $jurusan['total_mahasiswa'] ?? 0 }}</h6>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="text-center"> data masih kosong</div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

        <!-- Expense Overview -->
        <div class="col-md-6 col-lg-4 order-1 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Data Kriteria</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="{{ route('kriterias-kriteria') }}">View More</a>
                            {{-- <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel"
                            style="position: relative;">
                            {{-- <div class="d-flex p-4 pt-3"> --}}
                                {{-- <div class="avatar flex-shrink-0 me-3">
                                    <img src="http://127.0.0.1:8000/assets/img/icons/unicons/wallet.png" alt="User">
                                </div> --}}
                                {{-- <div>
                                    <small class="text-muted d-block">Total Balance</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-medium">
                                            <i class="bx bx-chevron-up"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            <div id="kriteriaChart" style="min-height: 215px;">

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Top Mahasiswa</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="{{ route('ranking') }}">View More</a>
                            {{-- <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">

                        @forelse ($data['mahasiswas'] as $mahasiswa)
                            <li class="d-flex mb-4 pb-1">
                                <div class=" flex-shrink-0 badge badge-center rounded-pill bg-label-success">
                                    <i class='bx bx-user'></i>
                                </div>

                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2 mx-2">
                                        <h6 class="mb-0">{{ $mahasiswa['nama'] ?? '' }}</h6>
                                        {{-- <small class="text-muted d-block mb-1">Paypal</small> --}}
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{ $mahasiswa['skor'] ?? '' }}</h6>
                                    </div>
                                </div>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>

    @push('pricing-script')
        <script>
            $.ajax({
                url: '/admin/dashboard/kriteria',
                method: 'GET',
                dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                success: function(value) {
                    // console.log(data);
                    let bobot = [];
                    let kriteria = [];
                    for (let i = 0; i < value.length; i++) {
                        // bobot[i] = ;
                        bobot.push(value[i].bobot);
                        kriteria.push(value[i].kriteria);
                    }

                    let incomeChartEl = document.querySelector('#kriteriaChart'),
                        incomeChartConfig = {
                            series: [{
                                data: bobot
                            }],
                            chart: {
                                height: 215,
                                parentHeightOffset: 0,
                                parentWidthOffset: 0,
                                toolbar: {
                                    show: false
                                },
                                type: 'area'
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                width: 2,
                                curve: 'straight'
                            },
                            legend: {
                                show: false
                            },
                            markers: {
                                size: 6,
                                colors: 'transparent',
                                strokeColors: 'transparent',
                                strokeWidth: 4,
                                discrete: [{
                                    fillColor: config.colors.white,
                                    seriesIndex: 0,
                                    dataPointIndex: 7,
                                    strokeColor: config.colors.primary,
                                    strokeWidth: 2,
                                    size: 6,
                                    radius: 8
                                }],
                                hover: {
                                    size: 7
                                }
                            },
                            colors: [config.colors.primary],
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shadeIntensity: 0.6,
                                    opacityFrom: 0.5,
                                    opacityTo: 0.25,
                                    stops: [0, 95, 100]
                                }
                            },
                            grid: {
                                // borderColor: borderColor,
                                strokeDashArray: 3,
                                padding: {
                                    top: -20,
                                    bottom: -8,
                                    left: 10,
                                    right: 10
                                }
                            },
                            xaxis: {
                                categories: kriteria,
                                axisBorder: {
                                    show: false
                                },
                                axisTicks: {
                                    show: false
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        fontSize: '13px',
                                        // colors: axisColor
                                    }
                                }
                            },
                            yaxis: {
                                labels: {
                                    show: true
                                },
                                min: 0,
                                max: 10,
                                tickAmount: 5
                            }
                        };
                    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
                        const kriteriaChart = new ApexCharts(incomeChartEl, incomeChartConfig);
                        kriteriaChart.render();
                    }

                },
                error: function() {
                    console.log('Gagal mengambil data kriteria.');
                }
            });


            // console.log(incomeChartEl);
        </script>
    @endpush


@endsection
