@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Connexion')

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
        <img src="{{asset('assets/img/illustrations/boy-with-rocket-'.$configData['style'].'.png')}}" class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-start authentication-bg p-sm-3 p-3">
      <div class="w-px-400 mx-auto mt-2">

        <!-- Logo -->
        <div class="app-brand mb-3 text-center mt-2">
          <div class="text-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo d-block">
                <img src="{{ asset('Coms_Ml_logo.png') }}" class="mx-auto" width="30%" alt="">
              </span>
            </a>
          </div>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Bonjour 👋 et Bienvenu sur {{config('variables.templateName')}}!</h4>
        <p class="mb-4">Veuillez renseigner les champs ci-dessous</p>


        @error ('fail')
        <div class="alert alert-success mb-1 rounded-0" role="alert">
          <div class="alert-body">
            {{ $message }}
          </div>
        </div>
        @enderror

        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="login-email" class="form-label">Commissariat</label>
            <select class="form-control @error('commissariat_id') is-invalid @enderror" name="commissariat_id" id="">
              <option value="{{ 0 }}" autofocus>Votre commissariat</option>
              @forelse ($coms as $com )
              <option value="{{$com->id}}">{{$com->sigle}} de {{$com->localite}}</option>
              @empty

              @endforelse
            </select>
            @error('commissariat_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="login-email" class="form-label">Identifiant</label>
            <input type="text" autocomplete="off" class="form-control @error('pseudo') is-invalid @enderror"
               name="pseudo" placeholder="Votre identifiant" required value="{{ old('pseudo') }}">

            @error('pseudo')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Mot de passe</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>Mot de passe oublié ?</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="login-password" style="letter-spacing: 5px;" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember-me">
                Se souvenir de moi
              </label>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100" type="submit">Se connecter</button>
        </form>

        <div class="divider my-4">

        </div>
        </div>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
@endsection
