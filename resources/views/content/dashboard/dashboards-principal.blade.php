@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tableau de bord')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')

<script src="{{asset('assets/js/dashboards-analytics.blade.php')}}"></script>
<!-- Votre vue HTML ici -->


@endsection

@section('content')

<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Bienvenue {{Auth::user()->name}} sur {{config('variables.templateName')}} ! 🎉</h5>
            <p class="mb-4">Vous êtes sur l'application web de la police nationale du Mali</p>

            <a href="{{ route('compte-profil-user-view') }}" class="btn btn-sm btn-label-primary">Voir profil</a>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-'.$configData['style'].'.png')}}" height="140" alt="Photo d'accueil" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-semibold mb-1">Membres</span>
            <h3 class="card-title mb-1">{{$usernbr}}</h3>
          </div>
           <div id="orderChart" class="mb-3"></div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('Coms_Ml_logo.png') }}" alt="Credit Card" class="rounded">
              </div>
               <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div> --}}
              </div>
            </div>
            <span>Commissariats</span>
            <h3 class="card-title text-nowrap mb-1">{{ $commnbr }}</h3>
            {{-- <small class="text-success fw-semibold"></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Total Revenue -->
  <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-8">
          <h5 class="card-header m-0 me-2 pb-3">Evolution des affectations de Tenue</h5>
          <div id="totalRevenueChart" class="px-2"></div>
        </div>
        {{-- <div class="col-md-4"> --}}
          {{-- <div class="card-body"> --}}
            {{-- <div class="text-center"> --}}
              {{-- <div class="dropdown"> --}}
                {{-- <button class="btn btn-sm btn-label-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  2022
                </button> --}}
                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                  <a class="dropdown-item" href="javascript:void(0);">2021</a>
                  <a class="dropdown-item" href="javascript:void(0);">2020</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                </div> --}}
              {{-- </div> --}}
            {{-- </div> --}}
          {{-- </div> --}}
          {{-- <div id="growthChart"></div>
          <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div> --}}

          {{-- <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between"> --}}
            {{-- <div class="d-flex"> --}}
              {{-- <div class="me-2">
                <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
              </div> --}}
              {{-- <div class="d-flex flex-column">
                <small>2022</small>
                <h6 class="mb-0">$32.5k</h6>
              </div> --}}
            {{-- </div> --}}
            {{-- <div class="d-flex"> --}}
              {{-- <div class="me-2">
                <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
              </div> --}}
              {{-- <div class="d-flex flex-column">
                <small>2021</small>
                <h6 class="mb-0">$41.2k</h6>
              </div> --}}
            {{-- </div> --}}
          {{-- </div> --}}
        {{-- </div> --}}
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->
  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
    <div class="row">
      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span class="d-block mb-1">Payments</span>
            <h3 class="card-title text-nowrap mb-2">$2,456</h3>
            <small class="text-danger fw-semibold"><i class='bx bx-down-arrow-alt'></i> -14.82%</small>
          </div>
        </div>
      </div>
      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body pb-2">
            <span class="d-block fw-semibold mb-1">Revenue</span>
            <h3 class="card-title mb-1">425k</h3>
            <div id="revenueChart"></div>
          </div>
        </div>
      </div>
      <!-- </div>
    <div class="row"> -->
      {{-- <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                <div class="card-title">
                  <h5 class="text-nowrap mb-2">Profile Report</h5>
                  <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                </div>
                <div class="mt-sm-auto">
                  <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
                  <h3 class="mb-0">$84,686k</h3>
                </div>
              </div>
              <div id="profileReportChart"></div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</div>

{{-- <div class="row"> --}}
  <!-- Order Statistics -->
  {{-- <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Order Statistics</h5>
          <small class="text-muted">42.82k Total Sales</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">8,258</h2>
            <span>Total Orders</span>
          </div>
          <div id="orderStatisticsChart"></div>
        </div>
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-mobile-alt'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Electronic</h6>
                <small class="text-muted">Mobile, Earbuds, TV</small>
              </div>
              <div class="user-progress">
                <small class="fw-semibold">82.5k</small>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-success"><i class='bx bx-closet'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Fashion</h6>
                <small class="text-muted">T-shirt, Jeans, Shoes</small>
              </div>
              <div class="user-progress">
                <small class="fw-semibold">23.8k</small>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bx-home-alt'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Decor</h6>
                <small class="text-muted">Fine Art, Dining</small>
              </div>
              <div class="user-progress">
                <small class="fw-semibold">849k</small>
              </div>
            </div>
          </li>
          <li class="d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-football'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Sports</h6>
                <small class="text-muted">Football, Cricket Kit</small>
              </div>
              <div class="user-progress">
                <small class="fw-semibold">99</small>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div> --}}
  <!--/ Order Statistics -->

  <!-- Expense Overview -->
  {{-- <div class="col-md-6 col-lg-4 order-1 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income" aria-selected="true">Income</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab">Expenses</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab">Profit</button>
          </li>
        </ul>
      </div>
      <div class="card-body px-0">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
            <div class="d-flex p-4 pt-3">
              <div class="avatar flex-shrink-0 me-3">
                <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User">
              </div>
              <div>
                <small class="text-muted d-block">Total Balance</small>
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$459.10</h6>
                  <small class="text-success fw-semibold">
                    <i class='bx bx-chevron-up'></i>
                    42.9%
                  </small>
                </div>
              </div>
            </div>
            <div id="incomeChart"></div>
            <div class="d-flex justify-content-center pt-4 gap-2">
              <div class="flex-shrink-0">
                <div id="expensesOfWeek"></div>
              </div>
              <div>
                <p class="mb-n1 mt-1">Expenses This Week</p>
                <small class="text-muted">$39 less than last week</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!--/ Expense Overview -->

  <!-- Transactions -->
  {{-- <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Transactions</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Paypal</small>
                <h6 class="mb-0">Send money</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">+82.6</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Wallet</small>
                <h6 class="mb-0">Mac'D</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">+270.69</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Transfer</small>
                <h6 class="mb-0">Refund</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">+637.91</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/cc-success.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Credit Card</small>
                <h6 class="mb-0">Ordered Food</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">-838.71</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Wallet</small>
                <h6 class="mb-0">Starbucks</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">+203.33</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
          <li class="d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Mastercard</small>
                <h6 class="mb-0">Ordered Food</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">-92.45</h6> <span class="text-muted">USD</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div> --}}
  <!--/ Transactions -->
  <!-- Activity Timeline -->
  {{-- <div class="col-md-12 col-lg-6 order-4 order-lg-3 ">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Activity Timeline</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- Activity Timeline -->
        <ul class="timeline">
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-primary"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-1">
                <h6 class="mb-0">12 Invoices have been paid</h6>
                <small class="text-muted">12 min ago</small>
              </div>
              <p class="mb-2">Invoices have been paid to the company</p>
              <div class="d-flex">
                <a href="javascript:void(0)" class="d-flex align-items-center me-3">
                  <img src="{{asset('assets/img/icons/misc/pdf.png')}}" alt="PDF image" width="23" class="me-2">
                  <h6 class="mb-0">invoices.pdf</h6>
                </a>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-warning"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-1">
                <h6 class="mb-0">Client Meeting</h6>
                <small class="text-muted">45 min ago</small>
              </div>
              <p class="mb-2">Project meeting with john @10:15am</p>
              <div class="d-flex flex-wrap">
                <div class="avatar me-3">
                  <img src="{{asset('assets/img/avatars/3.png')}}" alt="Avatar" class="rounded-circle" />
                </div>
                <div>
                  <h6 class="mb-0">Lester McCarthy (Client)</h6>
                  <span>CEO of ThemeSelection</span>
                </div>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-info"></span>
            <div class="timeline-event pb-0">
              <div class="timeline-header mb-1">
                <h6 class="mb-0">Create a new project for client</h6>
                <small class="text-muted">2 Day Ago</small>
              </div>
              <p class="mb-2">5 team members in a project</p>
              <div class="d-flex align-items-center avatar-group">
                <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy">
                  <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                </div>
                <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Marrie Patty">
                  <img src="{{asset('assets/img/avatars/12.png')}}" alt="Avatar" class="rounded-circle">
                </div>
                <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Jimmy Jackson">
                  <img src="{{asset('assets/img/avatars/9.png')}}" alt="Avatar" class="rounded-circle">
                </div>
                <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kristine Gill">
                  <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                </div>
                <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nelson Wilson">
                  <img src="{{asset('assets/img/avatars/14.png')}}" alt="Avatar" class="rounded-circle">
                </div>
              </div>
            </div>
          </li>
          <li class="timeline-end-indicator">
            <i class="bx bx-check-circle"></i>
          </li>
        </ul>
        <!-- /Activity Timeline -->
      </div>
    </div>
  </div> --}}
  <!--/ Activity Timeline -->
  <!-- pill table -->
  {{-- <div class="col-md-6 order-3 order-lg-4 mb-4 mb-lg-0">
    <div class="card text-center">
      <div class="card-header py-3">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-browser" aria-controls="navs-pills-browser" aria-selected="true">Browser</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-os" aria-controls="navs-pills-os" aria-selected="false">Operating System</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-country" aria-controls="navs-pills-country" aria-selected="false">Country</button>
          </li>
        </ul>
      </div>
      <div class="tab-content pt-0">
        <div class="tab-pane fade show active" id="navs-pills-browser" role="tabpanel">
          <div class="table-responsive text-start">
            <table class="table table-borderless text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Browser</th>
                  <th>Visits</th>
                  <th class="w-50">Data In Percentage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/chrome.png')}}" alt="Chrome" height="24" class="me-2">
                      <span>Chrome</span>
                    </div>
                  </td>
                  <td>8.92k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 84.75%" aria-valuenow="84.75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">84.75%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/safari.png')}}" alt="Safari" height="24" class="me-2">
                      <span>Safari</span>
                    </div>
                  </td>
                  <td>7.29k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72.43%" aria-valuenow="72.43" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">72.43%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/firefox.png')}}" alt="Firefox" height="24" class="me-2">
                      <span>Firefox</span>
                    </div>
                  </td>
                  <td>6.11k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 67.37%" aria-valuenow="67.37" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">67.37%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/edge.png')}}" alt="Edge" height="24" class="me-2">
                      <span>Edge</span>
                    </div>
                  </td>
                  <td>5.08k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60.12%" aria-valuenow="60.12" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">60.12%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/opera.png')}}" alt="Opera" height="24" class="me-2">
                      <span>Opera</span>
                    </div>
                  </td>
                  <td>3.93k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 51.94%" aria-valuenow="51.94" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">51.94%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/brave.png')}}" alt="Brave" height="24" class="me-2">
                      <span>Brave</span>
                    </div>
                  </td>
                  <td>3.19k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 39.94%" aria-valuenow="39.94" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">39.94%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/vivaldi.png')}}" alt="Vivaldi" height="24" class="me-2">
                      <span>Vivaldi</span>
                    </div>
                  </td>
                  <td>1.29k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 28.43%" aria-valuenow="28.43" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">18.43%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/uc.png')}}" alt="UC Browser" height="24" class="me-2">
                      <span>UC Browser</span>
                    </div>
                  </td>
                  <td>328</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20.14%" aria-valuenow="20.14" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">20.14%</small>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-os" role="tabpanel">
          <div class="table-responsive text-start">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>No</th>
                  <th>System</th>
                  <th>Visits</th>
                  <th class="w-50">Data In Percentage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/windows.png')}}" alt="Windows" height="24" class="me-2">
                      <span>Windows</span>
                    </div>
                  </td>
                  <td>875.24k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 71.50%" aria-valuenow="71.50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">71.50%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/mac.png')}}" alt="Mac" height="24" class="me-2">
                      <span>Mac</span>
                    </div>
                  </td>
                  <td>89.68k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66.67%" aria-valuenow="66.67" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">66.67%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/ubuntu.png')}}" alt="Ubuntu" height="24" class="me-2">
                      <span>Ubuntu</span>
                    </div>
                  </td>
                  <td>37.68k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 62.82%" aria-valuenow="62.82" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">62.82%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/chrome.png')}}" alt="Chrome" height="24" class="me-2">
                      <span>Chrome</span>
                    </div>
                  </td>
                  <td>35.34k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 56.25%" aria-valuenow="56.25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">56.25%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/cent.png')}}" alt="Cent" height="24" class="me-2">
                      <span>Cent</span>
                    </div>
                  </td>
                  <td>32.25k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 42.76%" aria-valuenow="42.76" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">42.76%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/linux.png')}}" alt="Linux" height="24" class="me-2">
                      <span>Linux</span>
                    </div>
                  </td>
                  <td>22.15k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 37.77%" aria-valuenow="37.77" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">37.77%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/fedora.png')}}" alt="Fedora" height="24" class="me-2">
                      <span>Fedora</span>
                    </div>
                  </td>
                  <td>1.13k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 29.16%" aria-valuenow="29.16" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">29.16%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/img/icons/brands/vivaldi-os.png')}}" alt="Vivaldi" height="24" class="me-2">
                      <span>Vivaldi</span>
                    </div>
                  </td>
                  <td>1.09k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 26.26%" aria-valuenow="26.26" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">26.26%</small>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-country" role="tabpanel">
          <div class="table-responsive text-start">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Country</th>
                  <th>Visits</th>
                  <th class="w-50">Data In Percentage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/us.svg')}}" alt="USA" height="24" class="me-2">
                      <span>USA</span>
                    </div>
                  </td>
                  <td>87.24k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 89.12%" aria-valuenow="89.12" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">89.12%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/br.svg')}}" alt="Brazil" height="24" class="me-2">
                      <span>Brazil</span>
                    </div>
                  </td>
                  <td>62.68k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 78.23%" aria-valuenow="78.23" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">78.23%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/in.svg')}}" alt="India" height="24" class="me-2">
                      <span>India</span>
                    </div>
                  </td>
                  <td>52.58k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 69.82%" aria-valuenow="69.82" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">69.82%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/au.svg')}}" alt="Australia" height="24" class="me-2">
                      <span>Australia</span>
                    </div>
                  </td>
                  <td>44.13k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 59.90%" aria-valuenow="59.90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">59.90%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/de.svg')}}" alt="Germany" height="24" class="me-2">
                      <span>Germany</span>
                    </div>
                  </td>
                  <td>32.21k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 57.11%" aria-valuenow="57.11" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">57.11%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/fr.svg')}}" alt="France" height="24" class="me-2">
                      <span>France</span>
                    </div>
                  </td>
                  <td>37.87k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 41.23%" aria-valuenow="41.23" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">41.23%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/pt.svg')}}" alt="Portugal" height="24" class="me-2">
                      <span>Portugal</span>
                    </div>
                  </td>
                  <td>20.29k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 37.11%" aria-valuenow="37.11" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">37.11%</small>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{asset('assets/svg/flags/cn.svg')}}" alt="China" height="24" class="me-2">
                      <span>China</span>
                    </div>
                  </td>
                  <td>12.21k</td>
                  <td>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                      <div class="progress w-100" style="height:10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 17.61%" aria-valuenow="17.61" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="fw-semibold">17.61%</small>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!--/ pill table -->
{{-- </div> --}}

 <script>
  //bar-charts
  /**
  * Dashboard Analytics
  */

  'use strict';

  (function () {
  let cardColor, headingColor, legendColor, labelColor, shadeColor, borderColor;

  if (isDarkStyle) {
  cardColor = config.colors_dark.cardColor;
  headingColor = config.colors_dark.headingColor;
  legendColor = config.colors_dark.bodyColor;
  labelColor = config.colors_dark.textMuted;
  borderColor = config.colors_dark.borderColor;
  } else {
  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  legendColor = config.colors.bodyColor;
  labelColor = config.colors.textMuted;
  borderColor = config.colors.borderColor;
  }

  // Order Area Chart
  // --------------------------------------------------------------------
  const orderAreaChartEl = document.querySelector('#orderChart'),
  orderAreaChartConfig = {
  chart: {
  height: 80,
  type: 'area',
  toolbar: {
  show: false
  },
  sparkline: {
  enabled: true
  }
  },
  markers: {
  size: 6,
  colors: 'transparent',
  strokeColors: 'transparent',
  strokeWidth: 4,
  discrete: [
  {
  fillColor: config.colors.white,
  seriesIndex: 0,
  dataPointIndex: 6,
  strokeColor: config.colors.success,
  strokeWidth: 2,
  size: 6,
  radius: 8
  }
  ],
  hover: {
  size: 7
  }
  },
  grid: {
  show: false,
  padding: {
  right: 8
  }
  },
  colors: [config.colors.success],
  fill: {
  type: 'gradient',
  gradient: {
  shade: shadeColor,
  shadeIntensity: 0.8,
  opacityFrom: 0.8,
  opacityTo: 0.25,
  stops: [0, 85, 100]
  }
  },
  dataLabels: {
  enabled: false
  },
  stroke: {
  width: 2,
  curve: 'smooth'
  },
  series: [
  {
  data: [180, 175, 275, 140, 205, 190, 295]
  }
  ],
  xaxis: {
  show: false,
  lines: {
  show: false
  },
  labels: {
  show: false
  },
  stroke: {
  width: 0
  },
  axisBorder: {
  show: false
  }
  },
  yaxis: {
  stroke: {
  width: 0
  },
  show: false
  }
  };
  if (typeof orderAreaChartEl !== undefined && orderAreaChartEl !== null) {
  const orderAreaChart = new ApexCharts(orderAreaChartEl, orderAreaChartConfig);
  orderAreaChart.render();
  }

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
  totalRevenueChartOptions = {
  series: [
  {
  name: '2021',
  data: [18, 7, 15, 29, 18, 12, 9]
  },
  {
  name: '2020',
  data: [-13, -18, -9, -14, -5, -17, -15]
  }
  ],
  chart: {
  height: 300,
  stacked: true,
  type: 'bar',
  toolbar: { show: false }
  },
  plotOptions: {
  bar: {
  horizontal: false,
  columnWidth: '33%',
  borderRadius: 12,
  startingShape: 'rounded',
  endingShape: 'rounded'
  }
  },
  colors: [config.colors.primary, config.colors.info],
  dataLabels: {
  enabled: false
  },
  stroke: {
  curve: 'smooth',
  width: 6,
  lineCap: 'round',
  colors: [cardColor]
  },
  legend: {
  show: true,
  horizontalAlign: 'left',
  position: 'top',
  markers: {
  height: 8,
  width: 8,
  radius: 12,
  offsetX: -3
  },
  labels: {
  colors: legendColor
  },
  itemMargin: {
  horizontal: 10
  }
  },
  grid: {
  borderColor: borderColor,
  padding: {
  top: 0,
  bottom: -8,
  left: 20,
  right: 20
  }
  },
  xaxis: {
  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
  labels: {
  style: {
  fontSize: '13px',
  colors: labelColor
  }
  },
  axisTicks: {
  show: false
  },
  axisBorder: {
  show: false
  }
  },
  yaxis: {
  labels: {
  style: {
  fontSize: '13px',
  colors: labelColor
  }
  }
  },
  responsive: [
  {
  breakpoint: 1700,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '32%'
  }
  }
  }
  },
  {
  breakpoint: 1580,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '35%'
  }
  }
  }
  },
  {
  breakpoint: 1440,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '42%'
  }
  }
  }
  },
  {
  breakpoint: 1300,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '48%'
  }
  }
  }
  },
  {
  breakpoint: 1200,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '40%'
  }
  }
  }
  },
  {
  breakpoint: 1040,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 11,
  columnWidth: '48%'
  }
  }
  }
  },
  {
  breakpoint: 991,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '30%'
  }
  }
  }
  },
  {
  breakpoint: 840,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '35%'
  }
  }
  }
  },
  {
  breakpoint: 768,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '28%'
  }
  }
  }
  },
  {
  breakpoint: 640,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '32%'
  }
  }
  }
  },
  {
  breakpoint: 576,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '37%'
  }
  }
  }
  },
  {
  breakpoint: 480,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '45%'
  }
  }
  }
  },
  {
  breakpoint: 420,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '52%'
  }
  }
  }
  },
  {
  breakpoint: 380,
  options: {
  plotOptions: {
  bar: {
  borderRadius: 10,
  columnWidth: '60%'
  }
  }
  }
  }
  ],
  states: {
  hover: {
  filter: {
  type: 'none'
  }
  },
  active: {
  filter: {
  type: 'none'
  }
  }
  }
  };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
  const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
  totalRevenueChart.render();
  }

  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const growthChartEl = document.querySelector('#growthChart'),
  growthChartOptions = {
  series: [78],
  labels: ['Growth'],
  chart: {
  height: 240,
  type: 'radialBar'
  },
  plotOptions: {
  radialBar: {
  size: 150,
  offsetY: 10,
  startAngle: -150,
  endAngle: 150,
  hollow: {
  size: '55%'
  },
  track: {
  background: cardColor,
  strokeWidth: '100%'
  },
  dataLabels: {
  name: {
  offsetY: 15,
  color: legendColor,
  fontSize: '15px',
  fontWeight: '600',
  fontFamily: 'Public Sans'
  },
  value: {
  offsetY: -25,
  color: headingColor,
  fontSize: '22px',
  fontWeight: '500',
  fontFamily: 'Public Sans'
  }
  }
  }
  },
  colors: [config.colors.primary],
  fill: {
  type: 'gradient',
  gradient: {
  shade: 'dark',
  shadeIntensity: 0.5,
  gradientToColors: [config.colors.primary],
  inverseColors: true,
  opacityFrom: 1,
  opacityTo: 0.6,
  stops: [30, 70, 100]
  }
  },
  stroke: {
  dashArray: 5
  },
  grid: {
  padding: {
  top: -35,
  bottom: -10
  }
  },
  states: {
  hover: {
  filter: {
  type: 'none'
  }
  },
  active: {
  filter: {
  type: 'none'
  }
  }
  }
  };
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
  const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
  growthChart.render();
  }

  // Revenue Bar Chart
  // --------------------------------------------------------------------
  const revenueBarChartEl = document.querySelector('#revenueChart'),
  revenueBarChartConfig = {
  chart: {
  height: 80,
  type: 'bar',
  toolbar: {
  show: false
  }
  },
  plotOptions: {
  bar: {
  barHeight: '80%',
  columnWidth: '75%',
  startingShape: 'rounded',
  endingShape: 'rounded',
  borderRadius: 2,
  distributed: true
  }
  },
  grid: {
  show: false,
  padding: {
  top: -20,
  bottom: -12,
  left: -10,
  right: 0
  }
  },
  colors: [
  config.colors_label.primary,
  config.colors_label.primary,
  config.colors_label.primary,
  config.colors_label.primary,
  config.colors.primary,
  config.colors_label.primary,
  config.colors_label.primary
  ],
  dataLabels: {
  enabled: false
  },
  series: [
  {
  data: [40, 95, 60, 45, 90, 50, 75]
  }
  ],
  legend: {
  show: false
  },
  xaxis: {
  categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
  axisBorder: {
  show: false
  },
  axisTicks: {
  show: false
  },
  labels: {
  style: {
  colors: labelColor,
  fontSize: '13px'
  }
  }
  },
  yaxis: {
  labels: {
  show: false
  }
  }
  };
  if (typeof revenueBarChartEl !== undefined && revenueBarChartEl !== null) {
  const revenueBarChart = new ApexCharts(revenueBarChartEl, revenueBarChartConfig);
  revenueBarChart.render();
  }

  // Profit Report Line Chart
  // --------------------------------------------------------------------
  const profileReportChartEl = document.querySelector('#profileReportChart'),
  profileReportChartConfig = {
  chart: {
  height: 80,
  // width: 175,
  type: 'line',
  toolbar: {
  show: false
  },
  dropShadow: {
  enabled: true,
  top: 10,
  left: 5,
  blur: 3,
  color: config.colors.warning,
  opacity: 0.15
  },
  sparkline: {
  enabled: true
  }
  },
  grid: {
  show: false,
  padding: {
  right: 8
  }
  },
  colors: [config.colors.warning],
  dataLabels: {
  enabled: false
  },
  stroke: {
  width: 5,
  curve: 'smooth'
  },
  series: [
  {
  data: [110, 270, 145, 245, 205, 285]
  }
  ],
  xaxis: {
  show: false,
  lines: {
  show: false
  },
  labels: {
  show: false
  },
  axisBorder: {
  show: false
  }
  },
  yaxis: {
  show: false
  }
  };
  if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
  const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
  profileReportChart.render();
  }

  // Order Statistics Chart
  // --------------------------------------------------------------------
  const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
  orderChartConfig = {
  chart: {
  height: 165,
  width: 130,
  type: 'donut'
  },
  labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
  series: [85, 15, 50, 50],
  colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
  stroke: {
  width: 5,
  colors: cardColor
  },
  dataLabels: {
  enabled: false,
  formatter: function (val, opt) {
  return parseInt(val) + '%';
  }
  },
  legend: {
  show: false
  },
  grid: {
  padding: {
  top: 0,
  bottom: 0,
  right: 15
  }
  },
  plotOptions: {
  pie: {
  donut: {
  size: '75%',
  labels: {
  show: true,
  value: {
  fontSize: '1.5rem',
  fontFamily: 'Public Sans',
  color: headingColor,
  offsetY: -15,
  formatter: function (val) {
  return parseInt(val) + '%';
  }
  },
  name: {
  offsetY: 20,
  fontFamily: 'Public Sans'
  },
  total: {
  show: true,
  fontSize: '0.8125rem',
  color: legendColor,
  label: 'Weekly',
  formatter: function (w) {
  return '38%';
  }
  }
  }
  }
  }
  }
  };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
  const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
  statisticsChart.render();
  }

  // Income Chart - Area chart
  // --------------------------------------------------------------------
  const incomeChartEl = document.querySelector('#incomeChart'),
  incomeChartConfig = {
  series: [
  {
  data: [24, 21, 30, 22, 42, 26, 35, 29]
  }
  ],
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
  curve: 'smooth'
  },
  legend: {
  show: false
  },
  markers: {
  size: 6,
  colors: 'transparent',
  strokeColors: 'transparent',
  strokeWidth: 4,
  discrete: [
  {
  fillColor: config.colors.white,
  seriesIndex: 0,
  dataPointIndex: 7,
  strokeColor: config.colors.primary,
  strokeWidth: 2,
  size: 6,
  radius: 8
  }
  ],
  hover: {
  size: 7
  }
  },
  colors: [config.colors.primary],
  fill: {
  type: 'gradient',
  gradient: {
  shade: shadeColor,
  shadeIntensity: 0.6,
  opacityFrom: 0.5,
  opacityTo: 0.25,
  stops: [0, 95, 100]
  }
  },
  grid: {
  borderColor: borderColor,
  strokeDashArray: 3,
  padding: {
  top: -20,
  bottom: -8,
  left: -10,
  right: 8
  }
  },
  xaxis: {
  categories: ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
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
  colors: labelColor
  }
  }
  },
  yaxis: {
  labels: {
  show: false
  },
  min: 10,
  max: 50,
  tickAmount: 4
  }
  };
  if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
  const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
  incomeChart.render();
  }

  // Expenses Mini Chart - Radial Chart
  // --------------------------------------------------------------------
  const weeklyExpensesEl = document.querySelector('#expensesOfWeek'),
  weeklyExpensesConfig = {
  series: [65],
  chart: {
  width: 60,
  height: 60,
  type: 'radialBar'
  },
  plotOptions: {
  radialBar: {
  startAngle: 0,
  endAngle: 360,
  strokeWidth: '8',
  hollow: {
  margin: 2,
  size: '45%'
  },
  track: {
  strokeWidth: '50%',
  background: borderColor
  },
  dataLabels: {
  show: true,
  name: {
  show: false
  },
  value: {
  formatter: function (val) {
  return '$' + parseInt(val);
  },
  offsetY: 5,
  color: '#697a8d',
  fontSize: '13px',
  show: true
  }
  }
  }
  },
  fill: {
  type: 'solid',
  colors: config.colors.primary
  },
  stroke: {
  lineCap: 'round'
  },
  grid: {
  padding: {
  top: -10,
  bottom: -15,
  left: -10,
  right: -10
  }
  },
  states: {
  hover: {
  filter: {
  type: 'none'
  }
  },
  active: {
  filter: {
  type: 'none'
  }
  }
  }
  };
  if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
  const weeklyExpenses = new ApexCharts(weeklyExpensesEl, weeklyExpensesConfig);
  weeklyExpenses.render();
  }
  })();
 </script>

@endsection


