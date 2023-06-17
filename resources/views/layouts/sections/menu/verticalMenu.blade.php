@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo mb-2">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo col-4">
        <img src="{{ asset('Coms_Ml_logo.png') }}" class="w-px-50 h-auto" alt="">
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  @endif

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->menu as $menu)

    

    @if (isset($menu->role))

    @hasanyrole($menu->role)

    {{-- menu headers --}}
    @if (isset($menu->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $menu->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $menu->slug) {
    $activeClass = 'active';
    }
    elseif (isset($menu->submenu)) {
    if (gettype($menu->slug) === 'array') {
    foreach($menu->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp


    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
        @isset($menu->icon)
        <i class="{{ $menu->icon }}"></i>
        @endisset
        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
      </a>

      {{-- submenu --}}
      @isset($menu->submenu)
      @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
      @endisset
    </li>
    @endif
    @else
      
    @endhasanyrole
    
    @endif
    @endforeach
  </ul>
  {{-- @if (Auth::check())
  
    <div class="menu-divider mb-0"></div>
    <ul class="m-0 p-0 bg-danger">
      <li class="menu-block my-1 d-flex flex-row justify-content-center">      
        <a title="Deconnexion" class="text-white fs-5" data-bs-placement="top" data-bs-toggle="tooltip" 
        href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span aria-hidden="true" class="bx bx-power-off"> Deconnexion</span>
        </a>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
          @csrf
        </form>
      </li>
    </ul>

  @endif --}}
  <script>
    const menus9List = document.querySelectorAll('.menus-9');
    if (menus9List) {
      menus9List.forEach(e => {
        new Menu(e);
      });
    }
  </script>
</aside>
