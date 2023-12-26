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
                                        <a class="dropdown-item" href="{{ route('kriteria') }}">View More</a>
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
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-4">
                        <h5 class="m-0 me-2">Asal Mahasiswa</h5>
                        {{-- <small class="text-muted">42.82k Total Sales</small> --}}
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="{{ route('mahasiswa') }}">View More</a>
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

                        @forelse ($data['asal_mahasiswa'] as $jurusan => $jumlah)
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i
                                            class="bx bx-mobile-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $jurusan ?? '' }}</h6>
                                        {{-- <small class="text-muted">Mobile, Earbuds, TV</small> --}}
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="fw-medium">{{ $jumlah ?? 0 }}</h6>
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
                <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income"
                                aria-selected="true">Income</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" aria-selected="false"
                                tabindex="-1">Expenses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" role="tab" aria-selected="false"
                                tabindex="-1">Profit</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel"
                            style="position: relative;">
                            <div class="d-flex p-4 pt-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="http://127.0.0.1:8000/assets/img/icons/unicons/wallet.png" alt="User">
                                </div>
                                <div>
                                    <small class="text-muted d-block">Total Balance</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-medium">
                                            <i class="bx bx-chevron-up"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div id="incomeChart" style="min-height: 215px;">
                                <div id="apexcharts6lyetres"
                                    class="apexcharts-canvas apexcharts6lyetres apexcharts-theme-light"
                                    style="width: 454px; height: 215px;"><svg id="SvgjsSvg4296" width="454"
                                        height="215" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS"
                                        transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG4298" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(0, 10)">
                                            <defs id="SvgjsDefs4297">
                                                <clipPath id="gridRectMask6lyetres">
                                                    <rect id="SvgjsRect4303" width="442.6875" height="176.70079907417298"
                                                        x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMask6lyetres"></clipPath>
                                                <clipPath id="nonForecastMask6lyetres"></clipPath>
                                                <clipPath id="gridRectMarkerMask6lyetres">
                                                    <rect id="SvgjsRect4304" width="464.6875" height="202.70079907417298"
                                                        x="-14" y="-14" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient4324" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop4325" stop-opacity="0.5"
                                                        stop-color="rgba(105,108,255,0.5)" offset="0"></stop>
                                                    <stop id="SvgjsStop4326" stop-opacity="0.25"
                                                        stop-color="rgba(195,196,255,0.25)" offset="0.95"></stop>
                                                    <stop id="SvgjsStop4327" stop-opacity="0.25"
                                                        stop-color="rgba(195,196,255,0.25)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine4302" x1="124.26785714285715" y1="0"
                                                x2="124.26785714285715" y2="174.70079907417298" stroke="#b6b6b6"
                                                stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                x="124.26785714285715" y="0" width="1" height="174.70079907417298"
                                                fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1">
                                            </line>
                                            <g id="SvgjsG4330" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG4331" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"><text id="SvgjsText4333"
                                                        font-family="Helvetica, Arial, sans-serif" x="0"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4334"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText4336"
                                                        font-family="Helvetica, Arial, sans-serif" x="62.38392857142858"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4337">Jan</tspan>
                                                        <title>Jan</title>
                                                    </text><text id="SvgjsText4339"
                                                        font-family="Helvetica, Arial, sans-serif" x="124.76785714285717"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4340">Feb</tspan>
                                                        <title>Feb</title>
                                                    </text><text id="SvgjsText4342"
                                                        font-family="Helvetica, Arial, sans-serif" x="187.15178571428572"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4343">Mar</tspan>
                                                        <title>Mar</title>
                                                    </text><text id="SvgjsText4345"
                                                        font-family="Helvetica, Arial, sans-serif" x="249.53571428571428"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4346">Apr</tspan>
                                                        <title>Apr</title>
                                                    </text><text id="SvgjsText4348"
                                                        font-family="Helvetica, Arial, sans-serif" x="311.91964285714283"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4349">May</tspan>
                                                        <title>May</title>
                                                    </text><text id="SvgjsText4351"
                                                        font-family="Helvetica, Arial, sans-serif" x="374.3035714285714"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4352">Jun</tspan>
                                                        <title>Jun</title>
                                                    </text><text id="SvgjsText4354"
                                                        font-family="Helvetica, Arial, sans-serif" x="436.68749999999994"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4355">Jul</tspan>
                                                        <title>Jul</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG4358" class="apexcharts-grid">
                                                <g id="SvgjsG4359" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine4361" x1="0" y1="0"
                                                        x2="436.6875" y2="0" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4362" x1="0" y1="43.675199768543244"
                                                        x2="436.6875" y2="43.675199768543244" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4363" x1="0" y1="87.35039953708649"
                                                        x2="436.6875" y2="87.35039953708649" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4364" x1="0" y1="131.02559930562973"
                                                        x2="436.6875" y2="131.02559930562973" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4365" x1="0" y1="174.70079907417298"
                                                        x2="436.6875" y2="174.70079907417298" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG4360" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine4367" x1="0" y1="174.70079907417298"
                                                    x2="436.6875" y2="174.70079907417298" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine4366" x1="0" y1="1" x2="0"
                                                    y2="174.70079907417298" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG4305" class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG4306" class="apexcharts-series" seriesName="seriesx1"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath4328"
                                                        d="M 0 174.70079907417298L 0 113.55551939821244C 21.834375 113.55551939821244 40.549553571428575 126.65807932877541 62.38392857142858 126.65807932877541C 84.21830357142858 126.65807932877541 102.93348214285714 87.3503995370865 124.76785714285715 87.3503995370865C 146.60223214285716 87.3503995370865 165.31741071428573 122.29055935192109 187.15178571428572 122.29055935192109C 208.98616071428572 122.29055935192109 227.7013392857143 34.9401598148346 249.5357142857143 34.9401598148346C 271.3700892857143 34.9401598148346 290.08526785714287 104.82047944450379 311.9196428571429 104.82047944450379C 333.7540178571429 104.82047944450379 352.4691964285714 65.51279965281486 374.30357142857144 65.51279965281486C 396.13794642857147 65.51279965281486 414.85312500000003 91.71791951394081 436.68750000000006 91.71791951394081C 436.68750000000006 91.71791951394081 436.68750000000006 91.71791951394081 436.68750000000006 174.70079907417298M 436.68750000000006 91.71791951394081z"
                                                        fill="url(#SvgjsLinearGradient4324)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMask6lyetres)"
                                                        pathTo="M 0 174.70079907417298L 0 113.55551939821244C 21.834375 113.55551939821244 40.549553571428575 126.65807932877541 62.38392857142858 126.65807932877541C 84.21830357142858 126.65807932877541 102.93348214285714 87.3503995370865 124.76785714285715 87.3503995370865C 146.60223214285716 87.3503995370865 165.31741071428573 122.29055935192109 187.15178571428572 122.29055935192109C 208.98616071428572 122.29055935192109 227.7013392857143 34.9401598148346 249.5357142857143 34.9401598148346C 271.3700892857143 34.9401598148346 290.08526785714287 104.82047944450379 311.9196428571429 104.82047944450379C 333.7540178571429 104.82047944450379 352.4691964285714 65.51279965281486 374.30357142857144 65.51279965281486C 396.13794642857147 65.51279965281486 414.85312500000003 91.71791951394081 436.68750000000006 91.71791951394081C 436.68750000000006 91.71791951394081 436.68750000000006 91.71791951394081 436.68750000000006 174.70079907417298M 436.68750000000006 91.71791951394081z"
                                                        pathFrom="M -1 218.37599884271623L -1 218.37599884271623L 62.38392857142858 218.37599884271623L 124.76785714285715 218.37599884271623L 187.15178571428572 218.37599884271623L 249.5357142857143 218.37599884271623L 311.9196428571429 218.37599884271623L 374.30357142857144 218.37599884271623L 436.68750000000006 218.37599884271623">
                                                    </path>
                                                    <path id="SvgjsPath4329"
                                                        d="M 0 113.55551939821244C 21.834375 113.55551939821244 40.549553571428575 126.65807932877541 62.38392857142858 126.65807932877541C 84.21830357142858 126.65807932877541 102.93348214285714 87.3503995370865 124.76785714285715 87.3503995370865C 146.60223214285716 87.3503995370865 165.31741071428573 122.29055935192109 187.15178571428572 122.29055935192109C 208.98616071428572 122.29055935192109 227.7013392857143 34.9401598148346 249.5357142857143 34.9401598148346C 271.3700892857143 34.9401598148346 290.08526785714287 104.82047944450379 311.9196428571429 104.82047944450379C 333.7540178571429 104.82047944450379 352.4691964285714 65.51279965281486 374.30357142857144 65.51279965281486C 396.13794642857147 65.51279965281486 414.85312500000003 91.71791951394081 436.68750000000006 91.71791951394081"
                                                        fill="none" fill-opacity="1" stroke="#696cff"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMask6lyetres)"
                                                        pathTo="M 0 113.55551939821244C 21.834375 113.55551939821244 40.549553571428575 126.65807932877541 62.38392857142858 126.65807932877541C 84.21830357142858 126.65807932877541 102.93348214285714 87.3503995370865 124.76785714285715 87.3503995370865C 146.60223214285716 87.3503995370865 165.31741071428573 122.29055935192109 187.15178571428572 122.29055935192109C 208.98616071428572 122.29055935192109 227.7013392857143 34.9401598148346 249.5357142857143 34.9401598148346C 271.3700892857143 34.9401598148346 290.08526785714287 104.82047944450379 311.9196428571429 104.82047944450379C 333.7540178571429 104.82047944450379 352.4691964285714 65.51279965281486 374.30357142857144 65.51279965281486C 396.13794642857147 65.51279965281486 414.85312500000003 91.71791951394081 436.68750000000006 91.71791951394081"
                                                        pathFrom="M -1 218.37599884271623L -1 218.37599884271623L 62.38392857142858 218.37599884271623L 124.76785714285715 218.37599884271623L 187.15178571428572 218.37599884271623L 249.5357142857143 218.37599884271623L 311.9196428571429 218.37599884271623L 374.30357142857144 218.37599884271623L 436.68750000000006 218.37599884271623">
                                                    </path>
                                                    <g id="SvgjsG4307" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g id="SvgjsG4309" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4310" r="6" cx="0"
                                                                cy="113.55551939821244"
                                                                class="apexcharts-marker no-pointer-events w1pk9ymz1g"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="0"
                                                                j="0" index="0" default-marker-size="6"></circle>
                                                            <circle id="SvgjsCircle4311" r="6" cx="62.38392857142858"
                                                                cy="126.65807932877541"
                                                                class="apexcharts-marker no-pointer-events w9jmf1e7r"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="1"
                                                                j="1" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4312" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4313" r="6" cx="124.76785714285715"
                                                                cy="87.3503995370865"
                                                                class="apexcharts-marker no-pointer-events wd7tr3n3k"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="2"
                                                                j="2" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4314" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4315" r="6" cx="187.15178571428572"
                                                                cy="122.29055935192109"
                                                                class="apexcharts-marker no-pointer-events wb8gcgnqb"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="3"
                                                                j="3" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4316" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4317" r="6" cx="249.5357142857143"
                                                                cy="34.9401598148346"
                                                                class="apexcharts-marker no-pointer-events w7w67jewg"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="4"
                                                                j="4" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4318" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4319" r="6" cx="311.9196428571429"
                                                                cy="104.82047944450379"
                                                                class="apexcharts-marker no-pointer-events wnhioa433g"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="5"
                                                                j="5" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4320" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4321" r="6" cx="374.30357142857144"
                                                                cy="65.51279965281486"
                                                                class="apexcharts-marker no-pointer-events wqctjw962"
                                                                stroke="transparent" fill="transparent" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="6"
                                                                j="6" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4322" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMask6lyetres)">
                                                            <circle id="SvgjsCircle4323" r="6" cx="436.68750000000006"
                                                                cy="91.71791951394081"
                                                                class="apexcharts-marker no-pointer-events wtlm7h20v"
                                                                stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9" rel="7"
                                                                j="7" index="0" default-marker-size="6"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG4308" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine4368" x1="0" y1="0" x2="436.6875"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine4369" x1="0" y1="0" x2="436.6875"
                                                y2="0" stroke-dasharray="0" stroke-width="0"
                                                stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG4370" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG4371" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG4372" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect4373" width="0" height="0" x="0" y="0"
                                                rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-zoom-rect"></rect>
                                            <rect id="SvgjsRect4374" width="0" height="0" x="0" y="0"
                                                rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-selection-rect"></rect>
                                        </g>
                                        <rect id="SvgjsRect4301" width="0" height="0" x="0" y="0"
                                            rx="0" ry="0" opacity="1" stroke-width="0"
                                            stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                        <g id="SvgjsG4356" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-8, 0)">
                                            <g id="SvgjsG4357" class="apexcharts-yaxis-texts-g"></g>
                                        </g>
                                        <g id="SvgjsG4299" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 107.5px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                        style="left: 136.768px; top: 90.8504px;">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Feb
                                        </div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(105, 108, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label">series-1: </span><span
                                                        class="apexcharts-tooltip-text-y-value">30</span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                        style="left: 101.374px; top: 186.701px;">
                                        <div class="apexcharts-xaxistooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 26.3049px;">
                                            Feb</div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4 gap-2">
                                <div class="flex-shrink-0" style="position: relative;">
                                    <div id="expensesOfWeek" style="min-height: 57.7px;">
                                        <div id="apexcharts6lfknhsu"
                                            class="apexcharts-canvas apexcharts6lfknhsu apexcharts-theme-light"
                                            style="width: 60px; height: 57.7px;"><svg id="SvgjsSvg4254" width="60"
                                                height="57.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                                class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)" style="background: transparent;">
                                                <g id="SvgjsG4256" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(-10, -10)">
                                                    <defs id="SvgjsDefs4255">
                                                        <clipPath id="gridRectMask6lfknhsu">
                                                            <rect id="SvgjsRect4258" width="86" height="87" x="-3"
                                                                y="-1" rx="0" ry="0" opacity="1"
                                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMask6lfknhsu"></clipPath>
                                                        <clipPath id="nonForecastMask6lfknhsu"></clipPath>
                                                        <clipPath id="gridRectMarkerMask6lfknhsu">
                                                            <rect id="SvgjsRect4259" width="84" height="89" x="-2"
                                                                y="-2" rx="0" ry="0" opacity="1"
                                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="SvgjsG4260" class="apexcharts-radialbar">
                                                        <g id="SvgjsG4261">
                                                            <g id="SvgjsG4262" class="apexcharts-tracks">
                                                                <g id="SvgjsG4263"
                                                                    class="apexcharts-radialbar-track apexcharts-track"
                                                                    rel="1">
                                                                    <path id="apexcharts-radialbarTrack-0"
                                                                        d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247"
                                                                        fill="none" fill-opacity="1"
                                                                        stroke="rgba(236,238,241,0.85)" stroke-opacity="1"
                                                                        stroke-linecap="round"
                                                                        stroke-width="2.0408536585365864"
                                                                        stroke-dasharray="0"
                                                                        class="apexcharts-radialbar-area"
                                                                        data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG4265">
                                                                <g id="SvgjsG4269"
                                                                    class="apexcharts-series apexcharts-radial-series"
                                                                    seriesName="seriesx1" rel="1"
                                                                    data:realIndex="0">
                                                                    <path id="SvgjsPath4270"
                                                                        d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095"
                                                                        fill="none" fill-opacity="0.85"
                                                                        stroke="rgba(105,108,255,0.85)" stroke-opacity="1"
                                                                        stroke-linecap="round"
                                                                        stroke-width="4.081707317073173"
                                                                        stroke-dasharray="0"
                                                                        class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                        data:angle="234" data:value="65" index="0"
                                                                        j="0"
                                                                        data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095">
                                                                    </path>
                                                                </g>
                                                                <circle id="SvgjsCircle4266" r="18.881402439024395"
                                                                    cx="40" cy="40"
                                                                    class="apexcharts-radialbar-hollow"
                                                                    fill="transparent"></circle>
                                                                <g id="SvgjsG4267" class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"
                                                                    style="opacity: 1;"><text id="SvgjsText4268"
                                                                        font-family="Helvetica, Arial, sans-serif" x="40"
                                                                        y="45" text-anchor="middle"
                                                                        dominant-baseline="auto" font-size="13px"
                                                                        font-weight="400" fill="#697a8d"
                                                                        class="apexcharts-text apexcharts-datalabel-value"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">$65</text>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <line id="SvgjsLine4271" x1="0" y1="0"
                                                        x2="80" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine4272" x1="0" y1="0"
                                                        x2="80" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                </g>
                                                <g id="SvgjsG4257" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend"></div>
                                        </div>
                                    </div>
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 61px; height: 59px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-n1 mt-1">Expenses This Week</p>
                                    <small class="text-muted">$39 less than last week</small>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 455px; height: 377px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
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

                        @forelse ($data['mahasiswas'] as $nama => $skor)
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="http://127.0.0.1:8000/assets/img/icons/unicons/paypal.png" alt="User"
                                        class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $nama ?? '' }}</h6>
                                        {{-- <small class="text-muted d-block mb-1">Paypal</small> --}}
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{ $skor ?? '' }}</h6>
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
@endsection
