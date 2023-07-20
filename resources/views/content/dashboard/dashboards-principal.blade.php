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
    <!-- Stat des membres -->
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
    <!-- Fin Stat des membres -->

    <!-- Statistiques users -->
    <div class="col-lg-6 order-2 mb-4">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-0">
                <h5 class="m-0 me-2">Statistiques anuelles</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column align-items-center gap-1">
                  <h2 class="mb-2">{{$usernbr}}</h2>
                  <span>Total Membre</span>
                </div>
                <div id="orderStatisticsChart"></div>
              </div>
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-male'></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                    <div class="me-2">
                      <h6 class="mb-0">Homme</h6>
                      <small class="text-muted">Nombre de personnel masculin</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-bolder fs-6">{{ $userH }}</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex mb-0 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-success"><i class='bx bx-female'></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                    <div class="me-2">
                      <h6 class="mb-0">Femme</h6>
                      <small class="text-muted">Nombre de personnel feminin</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-bolder fs-6">{{ $userF }}</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <!-- Fin Statistiques users -->

    <!-- Activites de connexion des utilisateurs -->
    <div class="col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body pb-2">
              <span class="d-block card-title fw-bold mb-1">Activites de connexion des utilisateurs</span>
              <span class="d-block fw-semibold mb-1">Nombre de minutes d'activité enregistrées à ce jour : <strong>{{ $Hours }} mins</strong></span>
              <div id="revenueChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Activites des utilisateurs -->

    <!-- Statistiques affectations tenues -->
    <div class="col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-12">
            <h5 class="card-header m-0 me-2 pb-3">Statistique des affectation du Tenue</h5>
            <div id="totalRevenueChart" class="px-2"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Statistiques affectations tenues -->
    
    @endunlessrole

  </div>
  


@endsection
