@extends('layouts/layoutMaster')

@section('title', 'Compte - Profil')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
@endsection

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-profile.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Compte /</span> Profil
</h4>

<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header-banner bg-dark">
        <img src="{{asset('assets/img/pages/police_head.png')}}" style="width: 100%; " alt="User image" class="rounded-top">
      </div>
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          <img src="{{ URL::to('public/Profils/'.Auth::user()->profile_photo_path) ?? asset('assets/img/avatars/1.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{ Auth::user()->name ?? 'Mohamed Mohamed'}}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-pen'></i>{{ Auth::user()->matricule ?? 'Matricule'}}
                </li>
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-map'></i> {{ Auth::user()->adresse ?? 'Residence'}}
                </li>
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-signal-5'></i> {{ Auth::user()->grade->libelle ?? 'Grade'}}
                </li>
              </ul>
            </div>

            {{-- button pour demander une affectation --}}
            @if (Auth::user()->commissariat_id != 0)
              <button class="btn btn-info text-nowrap cursor-pointer" data-bs-toggle="offcanvas" data-bs-target="#dmdeAffect" aria-controls="offcanvasEnd">
                <i class='bx bx-user-x'></i> Demander une affectation
              </button>
            @endif

            @if (Auth::user()->isActive == true)

            <button class="btn btn-primary text-nowrap">
              <i class='bx bx-user-check'></i> Votre compte est activé
            </button>

            @else

            <button  class="btn btn-danger text-nowrap">
              <i class='bx bx-user-x'></i> Votre compte est desactivé
            </button>

            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-muted text-uppercase">About</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Nom complet:</span> <span>{{ Auth::user()->name }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Statut:</span> <span>@if (Auth::user()->isActive == 1)
            Actif
          @else
            Pas actif
          @endif</span></li>
          {{-- <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Role:</span> <span></span></li> --}}
          {{-- <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>USA</span></li> --}}
          <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Commissariat:</span> <span>{{ Auth::user()->commissariat->libelle ?? '' }}</span></li>
        </ul>
        <small class="text-muted text-uppercase">Contacts</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> <span>(223) {{ Auth::user()->telephone }}</span></li>
          {{-- <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>john.doe</span></li> --}}
          <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span>{{ Auth::user()->email ?? '' }}</span></li>
        </ul>
      </div>
    </div>
    <!--/ About User -->
  </div>
  <div class="col-xl-8 col-lg-7 col-md-7">
    <!-- Activity Timeline -->
    <div class="card card-action mb-4">
      <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0"><i class='bx bx-list-ul me-2'></i>Vos 05 dernièrres sessions</h5>
      <br>
      </div>
      <div class="card-body">
        <ul class="timeline ms-2">
          @foreach ($sessions as $session)
            @php
              $created = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $session->created_at)->format('d-m-Y'.' à '.'H:i');
              $deconnexion = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $session->deconnexion)->format('d-m-Y'.' à '.'H:i');

            @endphp
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-warning"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-1">
                  <h6 class="mb-0">Du {{ $created }} au {{ $deconnexion }}</h6>
            </div>
          </li>
          @endforeach

          <li class="timeline-end-indicator">
            <i class="bx bx-check-circle"></i>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--/ User Profile Content -->

@include('_partials._modals.dmde_affectation')
@endsection
