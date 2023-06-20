@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Réinitialisation')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src="{{asset('assets/img/illustrations/girl-unlock-password-'.$configData['style'].'.png')}}" class="img-fluid" alt="Login image" width="600" data-app-dark-img="illustrations/girl-unlock-password-dark.png" data-app-light-img="illustrations/girl-unlock-password-light.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Forgot Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-3 text-center">
          <a href="{{url('/login')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo d-block">
              <img src="{{ asset('Coms_Ml_logo.png') }}" class="mx-auto" width="30%" alt="">
            </span>
          </a>
        </div> 
        <!-- /Logo -->
        <h4 class="mb-2">Mot de passe oublié ? 🔒</h4>
        <p class="mb-4">Donnez votre email pour recevoir les instructions de réinitialisation</p>

        @if (session('status'))
        <div class="mb-1 text-success">
          {{ session('status') }}
        </div>
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" autocomplete="off" required class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="test@test.com" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary d-grid w-100">Envoie du lien</button>
        </form>
        <div class="text-center">
          @if (Route::has('login'))
          <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl"></i>
            Retour à l'écran de connexion
          </a>
          @endif
        </div>
      </div>
    </div>
    <!-- /Forgot Password -->
  </div>
</div>
@endsection
