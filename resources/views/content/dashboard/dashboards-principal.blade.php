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
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>


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

    @unlessrole('Membre')
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
        @unlessrole('Commissaire')
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
                </div>
              </div>
              <span>Commissariats</span>
              <h3 class="card-title text-nowrap mb-1">{{ $commnbr }}</h3>
              {{-- <small class="text-success fw-semibold"></i> +28.42%</small> --}}
            </div>
          </div>
        </div>
        @endunlessrole
      </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-8">
            <h5 class="card-header m-0 me-2 pb-3">Statistique des affectation du Tenue</h5>
            <div id="totalRevenueChart" class="px-2"></div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="text-center">
                <div class="dropdown">
                  <button class="btn btn-sm btn-label-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    2022
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                    <a class="dropdown-item" href="javascript:void(0);">2021</a>
                    <a class="dropdown-item" href="javascript:void(0);">2020</a>
                    <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  </div>
                </div>
              </div>
            </div>
            <div id="growthChart"></div>
            <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
              <div class="d-flex">
                <div class="me-2">
                  <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>2022</small>
                  <h6 class="mb-0">$32.5k</h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-2">
                  <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>2021</small>
                  <h6 class="mb-0">$41.2k</h6>
                </div>
              </div>
            </div>
          </div>
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
              {{-- <span class="d-block mb-1">Payments</span>
              <h3 class="card-title text-nowrap mb-2">$2,456</h3>
              <small class="text-danger fw-semibold"><i class='bx bx-down-arrow-alt'></i> -14.82%</small> --}}
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
        <div class="col-12 mb-4">
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
        </div>
      </div>
    </div>
    @endunlessrole

  </div>

  @unlessrole(['Commissaire','Membre'])
  {{-- <div class="row">
    <!-- Expense Overview -->
    <div class="col-md-6 col-lg-4 order-1 mb-4">
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
    </div>
    <!--/ Expense Overview -->

  </div> --}}
  @endunlessrole


@endsection
