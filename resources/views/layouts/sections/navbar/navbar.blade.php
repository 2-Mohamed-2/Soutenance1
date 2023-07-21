@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar">
  @endif
  @if(isset($navbarDetached) && $navbarDetached == '')
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="{{$containerNav}}">
      @endif

      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      @if(isset($navbarFull))
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="javascript:void(0);" id="myButton" class="btn app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <img src="{{ asset('Coms_Ml_logo.png') }}" class="w-px-40 h-auto" alt="">
          </span>
          <span class="app-brand-text demo menu-text fw-bolder">{{config('variables.templateName')}}</span>
        </a>
      </div>
      @endif

      <!-- ! Not required for layout-without-menu -->
      @if(!isset($navbarHideToggle))
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      @endif

      <div class="navbar-nav-right d-flex align-items-arround" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">

          @if (Auth::user())
            {{-- mode sombre
            <li class="nav-item me-2 me-xl-0">
              <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                <i class='bx bx-sm'></i>
              </a>
            </li> --}}
            <li class="nav-item me-2 me-xl-0">
              <a class="nav-link hide-arrow" href="{{ url('/Compte/Profil') }}">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                        <img src="{{ URL::to('public/Profils/'.Auth::user()->profile_photo_path)}}" alt class="w-px-40 h-auto rounded-circle">
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">
                      {{ Auth::user()->name }}
                    </span>
                    <small class="text-muted">
                      {{ Auth::user()->grade->libelle ?? 'Pas de grade' }}
                  </div>
                </div>
              </a>
            </li>

            <li class="nav-item me-2 me-xl-0 bg-danger">
              <a class="nav-link hide-arrow" title="Deconnexion" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-power-off text-white bx-sm'></i>
              </a>
            </li>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
              @csrf
            </form>

          @elseif (Auth::guard('inconnu')->user())
            <li class="nav-item me-2 me-xl-0">
                <a href="javascript:void(0)" class="app-brand gap-2 nav-link hide-arrow">
                  <span class="avatar avatar-online">
                    <img src="{{ asset('Coms_Ml_logo.png') }}" class="w-px-40 h-auto" alt="">
                  </span>
                  <span class="text-dark demo text-wrap">{{ Auth::guard('inconnu')->user()->nomcomplet }}</span>
                </a>
            </li>

            <li class="nav-item me-2 me-xl-0">
            </li>

            <li class="nav-item me-2 me-xl-0 bg-danger">
              <a class="nav-link hide-arrow" title="Deconnexion" href="{{ route('vdestroy') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                <i class='bx bx-power-off text-white bx-sm'></i>
              </a>
            </li>
            <form method="POST" id="logout-form2" action="{{ route('vdestroy') }}">
              @csrf
            </form>
          @else
            <li class="nav-item me-2 me-xl-0">
              <a class="nav-link hide-arrow" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#actionscreate">
                <i class='bx bx-user-plus bx-sm'></i> Compte
              </a>
            </li>
            <li class="nav-item me-2 me-xl-0">
              <a class="nav-link hide-arrow" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#actionslogin">
                <i class='bx bx-log-in bx-sm'></i> Connexion
              </a>
            </li>
          @endif

          <!--/ Style Switcher -->


        </ul>
      </div>

      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper {{ isset($menuHorizontal) ? $containerNav : '' }} d-none">
        <input type="text" class="form-control search-input {{ isset($menuHorizontal) ? '' : $containerNav }} border-0" placeholder="Rechercher ..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
      </div>

      @if(!isset($navbarDetached))
    </div>
    @endif
  </nav>
</nav>



  <!-- / Navbar -->
